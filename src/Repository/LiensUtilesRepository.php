<?php

namespace App\Repository;

use App\Entity\LiensUtiles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LiensUtiles>
 *
 * @method LiensUtiles|null find($id, $lockMode = null, $lockVersion = null)
 * @method LiensUtiles|null findOneBy(array $criteria, array $orderBy = null)
 * @method LiensUtiles[]    findAll()
 * @method LiensUtiles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LiensUtilesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LiensUtiles::class);
    }

    public function save(LiensUtiles $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(LiensUtiles $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return LiensUtiles[] Returns an array of LiensUtiles objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LiensUtiles
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
