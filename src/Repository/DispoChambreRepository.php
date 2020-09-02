<?php

namespace App\Repository;

use App\Entity\DispoChambre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DispoChambre|null find($id, $lockMode = null, $lockVersion = null)
 * @method DispoChambre|null findOneBy(array $criteria, array $orderBy = null)
 * @method DispoChambre[]    findAll()
 * @method DispoChambre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DispoChambreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DispoChambre::class);
    }

    // /**
    //  * @return DispoChambre[] Returns an array of DispoChambre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DispoChambre
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
