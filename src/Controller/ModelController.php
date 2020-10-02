<?php

namespace App\Controller;

use App\Entity\Model;
use App\Repository\ModelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModelController extends AbstractController
{
    private $repository;
    private $em;

    public function __construct(ModelRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/model", name="model")
     */
    public function index()
    {
        $model = $this->repository->findAllByAuthor("Test");
        //$model = $this->repository->findById("ID667");
        dump($model);

        return $this->render('model/index.html.twig', [
            'controller_name' => 'ModelController',
        ]);
    }

    /**
     * @Route("/addmodel", name="addmodel")
     */
    public function addmodel()
    {   
        $model = new Model();
        $model->setAuthor('Imrane')
            ->setDescription('undefined desc')
            ->setFilename('myobject.gtlf');
            
        $this->em->persist($model);
        $this->em->flush();
        return new Response('Add in DB');
    }

    /**
     * @Route("/updatemodel", name="updatedesc")
     */
    public function updateDescription()
    {
        $model = $this->repository->findById("ID667");
        $model[0]->setDescription("Nouvelle description");
        $this->em->flush();

        dump($model);

        return new Response("<body>Update :</body>");
    }

}
