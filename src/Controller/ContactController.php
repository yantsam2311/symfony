<?php

namespace App\Controller;

use App\Entity\Taches;
use App\Repository\TachesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route("/contact", name: "contact")]
    function contact()
    {
        return $this->render('contact.html.twig');
            
    }
    #[Route("/traitement", name: "contact.traitement", methods: ["POST"])]

    function sendTache(Request $req, TachesRepository $repo)
    {
          // Récuperer les données depuis le corps de requête
          $nom= $req->request->get('nom');
          $isFinished = $req->request->get('isFinished');
  
          // Valider les donnée, sinon retourner 400
          if (!isset($nom) || !isset($isFinished) || $nom == "" || $isFinished == "") {
              return $this->render(
                  'contact.html.twig',
                  ['success' => false, 'message' => "Données obligatoires!"]
              );
          }
          // Utiliser Entity pour ajouter une  nouvelle tache
          $nouvelleTache = new Taches();
          $nouvelleTache->setNom($nom);
       
  
          // Utiliser Repository pour enregistrer le message
          $repo->sauvegarder($nouvelleTache, true);
          // Retourner le contact
          return $this->render(
              'contact.html.twig',
              ['success' => true, 'tache' => "tache enregistré"]
          );
      }
  }



    
    
          
    

    
    
