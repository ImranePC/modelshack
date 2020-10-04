<?php

namespace App\Controller;

use App\Repository\ModelRepository;
use App\Form\ModelType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{   
    /**
     * @Route("/home", name="home")
     */
    public function home()
    {   
        $myUrl = $_SERVER['REQUEST_URI'];
        return $this->render("pages/home.html.twig", [
            "pagename"=>"Home",
            "test"=>$myUrl,
        ]);
    }

    /**
     * @Route("/upload", name="upload")
     */
    public function upload(EntityManagerInterface $em,Request $request)
    {   
        $form = $this->createForm(ModelType::class);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $model = $form->getData();
            $model->setFilename('undefined name');
            $em->persist($model);
            //$em->flush();
            $this->addFlash("notice","Your model is uploaded - ID : " . $model->getIdmodel());

            return $this->redirectToRoute('upload');
        }

        return $this->render("pages/upload.html.twig", [
            "pagename"=>"Upload",
            "form"=>$form->createView(),
        ]);
    }

    /**
     * @Route("/view", name="view")
     */
    public function view()
    {
        return $this->render("pages/view.html.twig", [
            "pagename"=>"View",
        ]);    
    }

    /**
     * @Route("/search", name="search")
     */
    public function search(ModelRepository $repository)
    {
        $model = $repository->findLatest();
        dump($model);

        return $this->render("pages/search.html.twig", [
            "pagename"=>"Search",
            "models"=>$model
        ]);
    }

}

?>