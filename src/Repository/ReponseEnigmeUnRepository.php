<?php

namespace App\Repository;

use App\Entity\ReponseEnigmeUn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReponseEnigmeUn>
 *
 * @method ReponseEnigmeUn|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReponseEnigmeUn|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReponseEnigmeUn[]    findAll()
 * @method ReponseEnigmeUn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseEnigmeUnRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReponseEnigmeUn::class);
    }

    public function save(ReponseEnigmeUn $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ReponseEnigmeUn $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ReponseEnigmeUn[] Returns an array of ReponseEnigmeUn objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReponseEnigmeUn
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
