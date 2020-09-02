<?php

namespace App\Repository;

use App\Entity\MinstayProduit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MinstayProduit|null find($id, $lockMode = null, $lockVersion = null)
 * @method MinstayProduit|null findOneBy(array $criteria, array $orderBy = null)
 * @method MinstayProduit[]    findAll()
 * @method MinstayProduit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MinstayProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MinstayProduit::class);
    }

    // /**
    //  * @return MinstayProduit[] Returns an array of MinstayProduit objects
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
    public function findOneBySomeField($value): ?MinstayProduit
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
