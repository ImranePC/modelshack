<?php

namespace App\Controller\Backend;

use App\Repository\ModelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminModelController extends AbstractController
{

    /**
     * @var ModelRepository
     */
    private $repository;

    public function __construct(ModelRepository $repository)
    {
        $this->repository = $repository;        
    }

    /**
     * @Route("/testing", name="heho")
     */
    public function index()
    {
        $models = $this->repository->findAll();
        return $this->render('admin/model/index.html.twig', [
            "models" => $models,
            "pagename" => "Testing",
        ]);
        
    }

}

?>