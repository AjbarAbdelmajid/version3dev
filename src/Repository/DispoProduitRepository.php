<?php

namespace App\Repository;

use App\Entity\DispoProduit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DispoProduit|null find($id, $lockMode = null, $lockVersion = null)
 * @method DispoProduit|null findOneBy(array $criteria, array $orderBy = null)
 * @method DispoProduit[]    findAll()
 * @method DispoProduit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DispoProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DispoProduit::class);
    }

    // /**
    //  * @return DispoProduit[] Returns an array of DispoProduit objects
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
    public function findOneBySomeField($value): ?DispoProduit
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
