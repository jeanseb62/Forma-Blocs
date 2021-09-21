<?php

namespace App\Repository;

use App\Entity\Quotation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuotationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quotation::class);
    }

    public function findContactsByEmailPerDay($email)
    {
        $now = new \DateTime();
        $from = new \DateTime($now->format("Y-m-d")." 00:00:00");
        $to   = new \DateTime($now->format("Y-m-d")." 23:59:59");

        return $this->createQueryBuilder('c')
            // ->andWhere('c.created_at = NOW() ')
            ->andWhere('c.created_at BETWEEN :from AND :to ')
            ->andWhere('c.email = :email')
            ->setParameter('from', $from)
            ->setParameter('to', $to)
            ->setParameter('email', $email)
            ->getQuery()
            ->getResult()
            ;
    }

    
}