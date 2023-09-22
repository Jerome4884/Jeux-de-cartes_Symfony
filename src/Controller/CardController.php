<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\cards;
use App\Entity\Colors;
use App\Entity\Values;


#[Route('/cardsGame', name: 'jeu_de_cartes_directory')]

class CardController extends AbstractController {

    #[Route('/', name: 'index')]

    public function index(): Response {
        return $this->render('/controller_card/jeux-de-cartes.html.twig', [
            'controller_name' => 'CardController',
        ]);
    }

    public function cardGame(): Response{

        // génère dix cartes aléatoirement
        $hand = $this->handCardGenerate();

        // pour trier les cartes par couleurs et valeurs
        usort($hand, function ($a, $b) {
            if ($a->getColor() === $b->getColor()) {
                return strcmp($a->getValue(), $b->getValue());
            }
            return strcmp($a->getColor(), $b->getColor());
        });
        // Pour afficher la main non triée
        echo "Main non triée : <br>";
        foreach ($hand as $card) {
            echo $card->getColor() . " " . $card->getValue() . "<br>";
        }
        // Pour afficher la main triée
        echo "<br>Main triée : <br>";
        foreach ($hand as $card) {
            echo $card->getColor() . " " . $card->getValue() . "<br>";
        }
        // Permet d'avoir un visuel
        return $this->render('./templates/controller_card/jeux-de-cartes.html.twig', ['hand' => $hand]);

        return new Response();
    }

    // Creer une fonction pour générer cartes aléatoirement
    private function handCardGenerate(): array {

    $colors = ["Carreaux", "Coeur", "Pique", "Trèfle"];
    $values = ["AS", "2", "3", "4", "5", "6", "7", "8", "9", "10", "Valet", "Dame", "Roi"];

    // Création d'un tableau vide pour stocker les cartes
    $hand = [];

    // Boucle pour générer 10 cartes aléatoires
    for ($i = 0; $i < 10; $i++) {
        $card = new CardController(); // Crée une nouvelle instance de la classe Carte
        $card->setColor($colors[rand(0, 1)]); // Attribue une couleur aléatoire
        $card->setValue($values[rand(0, 12)]); // Attribue une valeur aléatoire
        $hand[] = $card; // Ajoute la carte à la main
    }

    return $hand; // Retourne la main de cartes générée

    }
}

?>