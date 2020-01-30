<?php

namespace App\Repository;

use App\Entity\HumanProject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HumanProject|null find($id, $lockMode = null, $lockVersion = null)
 * @method HumanProject|null findOneBy(array $criteria, array $orderBy = null)
 * @method HumanProject[]    findAll()
 * @method HumanProject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HumanProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HumanProject::class);
    }

    // /**
    //  * @return HumanProject[] Returns an array of HumanProject objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HumanProject
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
