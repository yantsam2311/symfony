<?php
namespace App\Repository;

use App\Entity\Auteur;
use App\Entity\Todos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TodosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, Todos::class);
    }

    public function sauvegarder(Todos $nouveauTodos, ?bool $isSave)
    {
        $this->getEntityManager()->persist($nouveauTodos);
        if($isSave){
            $this->getEntityManager()->flush();
        
        }
        return $nouveauTodos;
    }
}