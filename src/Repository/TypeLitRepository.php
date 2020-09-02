<?php

namespace App\Repository;

use App\Entity\TypeLit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeLit|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeLit|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeLit[]    findAll()
 * @method TypeLit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeLitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeLit::class);
    }

    // /**
    //  * @return TypeLit[] Returns an array of TypeLit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeLit
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
