<?php

namespace App\Repository;

use App\Entity\SupplementPhotos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SupplementPhotos|null find($id, $lockMode = null, $lockVersion = null)
 * @method SupplementPhotos|null findOneBy(array $criteria, array $orderBy = null)
 * @method SupplementPhotos[]    findAll()
 * @method SupplementPhotos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupplementPhotosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SupplementPhotos::class);
    }

    // /**
    //  * @return SupplementPhotos[] Returns an array of SupplementPhotos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SupplementPhotos
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
