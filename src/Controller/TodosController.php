<?php
namespace App\Controller;

use App\Entity\Todos;
use App\Repository\TodosRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class TodosController extends AbstractController
{
    #[Route("/todos", name: "todos.create", methods: ["POST"])]
    function creerTodos(Request $req, TodosRepository $repository)
    {
        // Récuperer les données depuis la requete
        $Id = $req->request->get('id'); 
        $nom = $req->request->get('nom'); 
        $Date= $req->request->get('date');

        // Valider le nom
        if (!isset($nom) || $nom == "" ||  !isset($Date) || $Date == "") {
            return $this->render('contact.html.twig', ['erreur' => "nom obligatoire !"]);

        }
          // Créer todos
          $nouveauTodos = new Todos();
          $nouveauTodos->setNom($nom)->setDate($Date);
  
          // Enregistrer Todos dans la BDD
          $TodosSavegarder = $repository->sauvegarder($nouveauTodos, true);
  
          return $this->render('Contact.html.twig',['id'=> $nouveauTodos -> getId(), "nom" =>$nouveauTodos-> getnom(),'date' => $nouveauTodos->getDate() ]);
      }
  
      #[Route("/todos", name: "todos.tout", methods: ["GET"])]
      function recupereTodos(TodosRepository $repo){
          $todos = $repo -> findAll();
          $todosTableau = [];
          foreach ($todos as $todo) {
              $todosTableau[] = [ 'id' => $todo->getId(), 'nom' =>$todo-> getnom()];
          }
          return $this->render('Contact.html.twig', ['todos' => $todosTableau]);
          
      }
    


}
