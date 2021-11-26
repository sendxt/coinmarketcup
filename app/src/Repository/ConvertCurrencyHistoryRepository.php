<?php

namespace App\Repository;

use App\Entity\ConvertedCurrencyHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConvertedCurrencyHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConvertedCurrencyHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConvertedCurrencyHistory[]    findAll()
 * @method ConvertedCurrencyHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConvertCurrencyHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConvertedCurrencyHistory::class);
    }
}
