<?php

namespace App\Controller;

use App\Entity\Taches;
use App\Repository\TachesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TachesController extends AbstractController
{
    #[Route("/tache", name: "taches.create", methods: ["POST"])]
    function creertache(Request $req, TachesRepository $repository)
    {
        // Récuperer les données depuis la requete
        $nom= $req->request->get('nom');
        $date= $req->request->get('date');


        // Valider le nom
        if (!isset($nom) || $nom == "" ||  !isset($isFinished) || $isFinished == "") {
            return $this->json(['erreur' => "nom obligatoire !"]);
        }

        // Créer une tache
        $nouvelleTache= new Taches();
        $nouvelleTache->setNom($nom);
        $nouvelleTache->setNom($isFinished);

        // Enregistrer la tache dans la BDD
        $tacheSavegarder = $repository->sauvegarder($nouvelleTache, true);

        return $this->render('contact.html.twig', ['id' => $tacheSavegarder->getId(), "nom" => $tacheSavegarder->getNom(),"isfinished" => $tacheSavegarder->getIsFinished() ]);
    }

    #[Route("/tache", name: "taches.tout", methods: ["GET"])]
    function recupereToutesTache(TachesRepository $repo){
        $taches = $repo -> findAll();
        $tachesTableau = [];
        foreach ($taches as $tache) {
            $tachesTableau[] = [ 'id' => $tache->getId(), 'nom' =>$tache-> getNom(),'date' => $tache-> getdate() ];
        }
        return $this->json($tachesTableau);

    }
}