<?php

namespace App\Repository;

use App\Entity\CategorieTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieTag[]    findAll()
 * @method CategorieTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieTag::class);
    }

    // /**
    //  * @return CategorieTag[] Returns an array of CategorieTag objects
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
    public function findOneBySomeField($value): ?CategorieTag
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
