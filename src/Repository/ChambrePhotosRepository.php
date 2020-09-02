<?php

namespace App\Repository;

use App\Entity\ChambrePhotos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChambrePhotos|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChambrePhotos|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChambrePhotos[]    findAll()
 * @method ChambrePhotos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChambrePhotosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChambrePhotos::class);
    }

    // /**
    //  * @return ChambrePhotos[] Returns an array of ChambrePhotos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ChambrePhotos
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
