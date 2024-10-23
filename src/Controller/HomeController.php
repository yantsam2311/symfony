<?php

namespace App\Controller;

use App\Repository\AuteurRepository;
use App\Repository\TodosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route("/home", name:"home")]
    function home(TodosRepository $TodosRepo)
    {

        $Todos = $TodosRepo->findAll();

        $nom = "L'Abeille";
        return $this->render('base.html.twig',['nom' => $nom, 'nom' =>$nom]);
    }
}