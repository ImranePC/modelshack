<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Environment\Twig;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    public function upload()
    {
        return $this->render("pages/home.html.twig", [
            "pagename"=>"Upload",
        ]);
    }

    public function view()
    {
        return $this->render("pages/home.html.twig", [
            "pagename"=>"View",
        ]);    
    }

    public function search()
    {
        return $this->render("pages/home.html.twig", [
            "pagename"=>"Search",
        ]);    
    }

}

?>