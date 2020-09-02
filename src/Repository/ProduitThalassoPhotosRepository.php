<?php

namespace App\Repository;

use App\Entity\ProduitThalassoPhotos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProduitThalassoPhotos|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitThalassoPhotos|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitThalassoPhotos[]    findAll()
 * @method ProduitThalassoPhotos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitThalassoPhotosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitThalassoPhotos::class);
    }

    // /**
    //  * @return ProduitThalassoPhotos[] Returns an array of ProduitThalassoPhotos objects
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
    public function findOneBySomeField($value): ?ProduitThalassoPhotos
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
