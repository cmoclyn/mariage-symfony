<?php

namespace App\Repository;

use App\Entity\TableDinner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TableDinner>
 *
 * @method TableDinner|null find($id, $lockMode = null, $lockVersion = null)
 * @method TableDinner|null findOneBy(array $criteria, array $orderBy = null)
 * @method TableDinner[]    findAll()
 * @method TableDinner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TableDinnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TableDinner::class);
    }

//    /**
//     * @return TableDinner[] Returns an array of TableDinner objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TableDinner
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
