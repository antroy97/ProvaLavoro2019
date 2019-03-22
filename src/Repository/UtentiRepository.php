<?php

namespace App\Repository;

use App\Entity\Utenti;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * @method Utenti|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utenti|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utenti[]    findAll()
 * @method Utenti[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtentiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Utenti::class);
    }

    public function getUsers(){

        $qb = $this->createQueryBuilder('u')
        ->orderBy('u.id', 'DESC')
        ->getQuery();
        return $qb->execute();
        
    }

    /**
     * 
     * @return ORM\NativeQuery
     */
    public function getRandomUsers()
    {
        /** Se avessi avuto piu tempo avrei implementato l estenzione esterna
         *  di doctrine per il random ma mi dava molti errori e ho preferito andare avanti
        */
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('App\Entity\Utenti', 'u');
        $rsm->addFieldResult('u', 'id', 'id');
        $rsm->addFieldResult('u', 'nome', 'nome');
        $rsm->addFieldResult('u', 'cognome', 'cognome');
        # make query
        return $this->getEntityManager()->createNativeQuery("
            SELECT id,nome,cognome FROM utenti ORDER BY RANDOM()
            ",$rsm)->getResult();
    }

    // /**
    //  * @return Utenti[] Returns an array of Utenti objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Utenti
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
