<?php

namespace App\Repository;

use App\Entity\MaxstayChambre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MaxstayChambre|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaxstayChambre|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaxstayChambre[]    findAll()
 * @method MaxstayChambre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaxstayChambreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaxstayChambre::class);
    }

    // /**
    //  * @return MaxstayChambre[] Returns an array of MaxstayChambre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MaxstayChambre
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
