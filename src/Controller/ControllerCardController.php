<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControllerCardController extends AbstractController
{
    #[Route('/card', name: 'jeu-de-cartes_directory')]
    public function index(): Response
    {
        return $this->render('controller_card/index.html.twig', [
            'controller_name' => 'ControllerCardController',
        ]);
    }
}
