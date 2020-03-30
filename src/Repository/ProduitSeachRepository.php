<?php

namespace App\Repository;

use App\Entity\ProduitSeach;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProduitSeach|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitSeach|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitSeach[]    findAll()
 * @method ProduitSeach[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitSeachRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitSeach::class);
    }

    // /**
    //  * @return ProduitSeach[] Returns an array of ProduitSeach objects
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
    public function findOneBySomeField($value): ?ProduitSeach
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
