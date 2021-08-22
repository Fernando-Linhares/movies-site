<?php

namespace App\Repository;

use App\Entity\Descripion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Descripion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Descripion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Descripion[]    findAll()
 * @method Descripion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DescripionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Descripion::class);
    }

    // /**
    //  * @return Descripion[] Returns an array of Descripion objects
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
    public function findOneBySomeField($value): ?Descripion
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
