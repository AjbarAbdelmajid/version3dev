<?php

namespace App\Repository;

use App\Entity\ProduitThalasso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProduitThalasso|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitThalasso|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitThalasso[]    findAll()
 * @method ProduitThalasso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitThalassoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitThalasso::class);
    }

    // /**
    //  * @return ProduitThalasso[] Returns an array of ProduitThalasso objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProduitThalasso
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
