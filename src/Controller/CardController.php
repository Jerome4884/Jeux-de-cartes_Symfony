<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cards;

#[Route('/cardsGame', name: 'jeu_de_cartes_directory')]

class CardController extends AbstractController {
    #[Route('/', name: 'controllerCard')]

    // public function index(): Response {

    //     return $this->render('controller_card/jeux-de-cartes.html.twig', [
    //         'controller_name' => 'CardController',

    //     ]);
    // }

    // Creer une fonction pour générer cartes aléatoirement
    public function handCardGenerate(): Response {
        // Création d'un tableau vide pour stocker les cartes triés et non triés
        $hand = [];
        $handSorted = [];

        $colors = ["Carreaux", "Coeur", "Pique", "Trèfle"];
        $values = ["AS", "2", "3", "4", "5", "6", "7", "8", "9", "10", "Valet", "Dame", "Roi"];
    
        // Boucle pour générer 10 cartes aléatoires
        for ($i = 0; $i < 10; $i++) {
            $cards = new Cards(); // Crée une nouvelle instance de la classe Carte
            $cards->setColor($colors[rand(0, 3)]); // Attribue une couleur aléatoire
            $cards->setValue($values[rand(0, 12)]); // Attribue une valeur aléatoire
            $hand[] = $cards; // Ajoute la carte à la main
        }

        $handSorted = $hand;
        // pour trier les cartes par couleurs et valeurs
        usort($handSorted, function ($a, $b) {
            if ($a->getColor() === $b->getColor()) {
                // Permet de faire la comparaison
                return strcmp($a->getValue(), $b->getValue());
            }
            return strcmp($a->getColor(), $b->getColor());
        });

            return $this->render('controller_card/jeux-de-cartes.html.twig', [
            'controller_name' => 'CardController',
            'hand' => $hand,
            'handSorted' => $handSorted,
        ]);

        
        // return new Response();
        
        // return $hand;  // Retourne la main de cartes générée non trié
        // return $handSorted; // Retourne la main de cartes générée trié
        }
    
    public function cardGame(): Response {

        // génère dix cartes aléatoirement
        $hand = $this->handCardGenerate();
        $handSorted = [];
        
        // Pour afficher la main non triée
        // echo "Main non triée : <br>";
        // foreach ($hand as $cards) {
        //     echo $cards->getCouleurs() . " " . $cards->getValeurs() . "<br>";
        // }
        // // Pour afficher la main triée
        // echo "<br> Main triée : <br>";
        // foreach ($handSorted as $cards) {
        //     echo $cards->getCouleurs() . " " . $cards->getValeurs() . "<br>";
        // }
        // Permet d'avoir un visuel
        return $this->render('controller_card/jeux-de-cartes.html.twig', [
            'controller_name' => 'CardController',
            'hand' => $hand,
            'handSorted' => $handSorted,
        ]);

        // return new Response();
    }
}

