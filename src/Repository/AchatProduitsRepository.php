<?php

namespace App\Repository;

use App\Entity\AchatProduits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AchatProduits|null find($id, $lockMode = null, $lockVersion = null)
 * @method AchatProduits|null findOneBy(array $criteria, array $orderBy = null)
 * @method AchatProduits[]    findAll()
 * @method AchatProduits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AchatProduitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AchatProduits::class);
    }

    // /**
    //  * @return AchatProduits[] Returns an array of AchatProduits objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AchatProduits
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
