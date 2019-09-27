<?php

namespace App\Repository;

use App\Entity\Annoucements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Annoucements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annoucements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annoucements[]    findAll()
 * @method Annoucements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnoucementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annoucements::class);
    }
    public function FindAnnouncements() :array
    {
        return $this->createQueryBuilder('annoucements')
            ->getQuery()
            ->getResult();
    }
    public function Find2LastAnnouncements($limit) :array
    {
        return $this->createQueryBuilder('annoucements')
            ->orderBy('annoucements.id','DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
    public function FindMoreAnnouncements($id) :array
    {
        return $this->createQueryBuilder('annoucements')
            ->Where('annoucements.id = :id')
            ->setParameter('id',$id)
            ->getQuery()
            ->getResult();
    }


}