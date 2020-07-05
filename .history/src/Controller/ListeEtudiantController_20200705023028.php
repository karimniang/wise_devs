<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListeEtudiantController extends AbstractController
{
    /**
     * @Route("/liste/etudiant", name="liste_etudiant")
     */
    public function index()
    {
        return $this->render('liste_etudiant/lsEtudiant.html.twig', [
            'controller_name' => 'ListeEtudiantController',
        ]);
    }
}
