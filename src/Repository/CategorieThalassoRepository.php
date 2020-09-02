<?php

namespace App\Repository;

use App\Entity\CategorieThalasso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieThalasso|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieThalasso|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieThalasso[]    findAll()
 * @method CategorieThalasso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieThalassoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieThalasso::class);
    }

    // /**
    //  * @return CategorieThalasso[] Returns an array of CategorieThalasso objects
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
    public function findOneBySomeField($value): ?CategorieThalasso
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
