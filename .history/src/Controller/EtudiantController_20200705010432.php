<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function index()
    {
        return $this->render('etudiant/addEtudiant.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }
}
