<?php

namespace App\Repository;

use App\Entity\ErrorCode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErrorCode>
 *
 * @method ErrorCode|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErrorCode|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErrorCode[]    findAll()
 * @method ErrorCode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErrorCodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErrorCode::class);
    }

//    /**
//     * @return ErrorCode[] Returns an array of ErrorCode objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ErrorCode
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
