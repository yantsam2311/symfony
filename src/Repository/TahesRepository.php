<?php
namespace App\Repository;

use App\Entity\Taches;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TachesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, Taches::class);
    }

    public function sauvegarder(Taches $nouvelleTaches, bool $isSave= true)
    {
        $this->getEntityManager()->persist($nouvelleTaches);
        if($isSave){
            $this->getEntityManager()->flush();
        
        }
        return $nouvelleTaches;
    }

    function supprimer(Taches $taches)
    {
        $this->getEntityManager()->remove($taches);
        $this->getEntityManager()->flush();

    }
}
 