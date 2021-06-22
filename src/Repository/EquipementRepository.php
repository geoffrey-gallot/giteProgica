<?php

namespace App\Repository;

use App\Entity\Equipement;
use App\Entity\GiteSearch;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Equipement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipement[]    findAll()
 * @method Equipement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipement::class);
    }

    // /**
    //  * @return Equipement[] Returns an array of Equipement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    
    // public function findAllGiteEquipementSearch(GiteSearch $search): array
    // {
    //     $query = $this->createQueryBuilder('e');
    //     if($search->getEquipements()){
    //         $query = $query
    //                     ->andWhere('e.equipement = :equipements')
    //                     ->setParameter(
    //                         'equipements',
    //                          $search->getEquipements()
    //                     );
    //     }

    //     return $query->getQuery()
    //                  ->getResult();
    // }
    
}
