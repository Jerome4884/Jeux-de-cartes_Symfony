<?php

namespace App\Repository;

use App\Entity\Cards;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cards>
 *
 * @method Cards|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cards|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cards[]    findAll()
 * @method Cards[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
                    // class CartesRepository extends ServiceEntityRepository
                    // {
                    //     public function __construct(ManagerRegistry $registry)
                    //     {
                    //         parent::__construct($registry, Cards::class);
                    //     }

//    /**
//     * @return Cards[] Returns an array of Cartes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cartes
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
// }

class CartesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cards::class);
    }

    public function findRandomCards($limit)
    {
        $cards = $this->createQueryBuilder('c')
            ->setMaxResults($limit) // Limite le nombre de résultats
            ->getQuery()
            ->getResult();
            // ->limit(10);

            $randomKeys = array_rand($cards, $limit);

    // Créez un tableau pour stocker les cartes aléatoires
    $randomCards = [];

    // Ajoutez les cartes correspondantes aux clés aléatoires
    foreach ($randomKeys as $key) {
        $randomCards[] = $cards[$key];
    }

    return $randomCards;
    }

    public function findCardsSortedByValue($limit)
    {
        return $this->createQueryBuilder('c')
            // ->orderBy('c.value') // Tri par valeur (assurez-vous que "valeur" est le nom correct de la colonne dans votre entité Cartes)
            ->setMaxResults($limit) // Limite le nombre de résultats
            ->getQuery()
            ->getResult();
            // ->limit(10);

    }
}       
