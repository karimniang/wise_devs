<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListeChambreController extends AbstractController
{
    /**
     * @Route("/liste/chambre", name="liste_chambre")
     */
    public function index()
    {
        return $this->render('liste_chambre/lsChambre.html.twig', [
            'controller_name' => 'ListeChambreController',
        ]);
    }
}
