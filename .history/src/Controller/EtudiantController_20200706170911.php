<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function index()
    {
        $etudiant = new Etudiant;
        $formEtudiant = $this->createForm(EtudiantType::class, $etudiant);
        return $this->render('etudiant/addEtudiant.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }
}
