<?php

namespace App\Controller;

use App\Repository\CartesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use App\Entity\Cards;
// use App\Entity\Colors;
// use App\Entity\Values;


#[Route('/Accueil', name: 'AccueilJeuCartes')]
class IndexController extends AbstractController
{
    #[Route('/', name: 'AccueilIndex')]
    public function index(CartesRepository $cartesRepository): Response
    {

        $randomCards = $cartesRepository->findRandomCards(10);
        shuffle($randomCards);
        // Récupérez 10 cartes triées par valeur
        $sortCards = $cartesRepository->findCardsSortedByValue(10);
        // Récupérez les cartes aléatoires depuis votre repository

        // Mélangez les valeurs des cartes
        foreach ($randomCards as $card) {
            $card->setString(rand(10, $card->getId()));
        }

        return $this->render('index/index.html.twig', [
            'Cards' => $cartesRepository->findAll([], ['id' => 'shuffle']),
            'controller_name' => 'IndexController',
            'randomCards' => $randomCards,
            'sortCards' => $sortCards,
        ]);
    }  
}








