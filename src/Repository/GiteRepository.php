<?php

namespace App\Repository;

use App\Entity\Gite;

use App\Entity\GiteSearch;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Gite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gite[]    findAll()
 * @method Gite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gite::class);
    }

    /**
    * @return Gite[] Returns an array of Gite objects
    */
    public function findLastGites()
    {
        return $this->createQueryBuilder('g')
            ->orderBy('g.id', 'DESC')
            ->setMaxResults(9)
            ->getQuery()
            ->getResult();
    }
    


    public function findAllGiteSearch(GiteSearch $search): array
    {
        
        $query = $this->createQueryBuilder('g');
        
        if($search->getMinSurface()){
            $query = $query
                        ->andWhere('g.superficy > :minSurface')
                        ->setParameter('minSurface', $search->getMinSurface());
        }

        if($search->getMinBedroom()){
            $query = $query
                        ->andWhere('g.bedroom > :minBedroom')
                        ->setParameter('minBedroom', $search->getMinBedroom());
        }

        if($search->getMaxPrice()){
            $query = $query
                        ->andWhere('g.priceHightSeason < :maxPrice')
                        ->setParameter('maxPrice', $search->getMaxPrice());
        }

        return $query->getQuery()
                     ->getResult();
    }
    /*
    public function findOneBySomeField($value): ?Gite
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
