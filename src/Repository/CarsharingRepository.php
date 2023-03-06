<?php

namespace App\Repository;

use App\Entity\Carsharing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Carsharing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carsharing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carsharing[]    findAll()
 * @method Carsharing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsharingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carsharing::class);
    }

    /**
     * @return Carsharing[] Returns an array of Carsharing objects
     */
    public function findAllExceptDriverEqualUser($user)
    { 
        return $this->createQueryBuilder('c')
            ->andWhere('c.driver != :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Carsharing
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
