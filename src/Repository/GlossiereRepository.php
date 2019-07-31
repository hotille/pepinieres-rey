<?php

namespace App\Repository;

use App\Entity\Glossiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Glossiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Glossiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Glossiere[]    findAll()
 * @method Glossiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlossiereRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Glossiere::class);
    }

    // /**
    //  * @return Glossiere[] Returns an array of Glossiere objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Glossiere
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
