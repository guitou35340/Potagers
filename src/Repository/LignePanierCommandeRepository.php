<?php

namespace App\Repository;

use App\Entity\LignePanierCommande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LignePanierCommande|null find($id, $lockMode = null, $lockVersion = null)
 * @method LignePanierCommande|null findOneBy(array $criteria, array $orderBy = null)
 * @method LignePanierCommande[]    findAll()
 * @method LignePanierCommande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LignePanierCommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LignePanierCommande::class);
    }

    // /**
    //  * @return LignePanierCommande[] Returns an array of LignePanierCommande objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LignePanierCommande
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
