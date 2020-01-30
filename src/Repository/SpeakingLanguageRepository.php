<?php

namespace App\Repository;

use App\Entity\SpeakingLanguage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SpeakingLanguage|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpeakingLanguage|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpeakingLanguage[]    findAll()
 * @method SpeakingLanguage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpeakingLanguageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpeakingLanguage::class);
    }

    // /**
    //  * @return SpeakingLanguage[] Returns an array of SpeakingLanguage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpeakingLanguage
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
