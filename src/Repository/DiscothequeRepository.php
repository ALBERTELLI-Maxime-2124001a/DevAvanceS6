<?php

namespace App\Repository;

use App\Entity\Discotheque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Discotheque>
 *
 * @method Discotheque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Discotheque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Discotheque[]    findAll()
 * @method Discotheque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscothequeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Discotheque::class);
    }

//    /**
//     * @return Discotheque[] Returns an array of Discotheque objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Discotheque
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
