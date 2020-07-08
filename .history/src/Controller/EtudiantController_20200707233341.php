<?php

namespace App\Controller;

use App\Entity\Boursier;
use App\Entity\Etudiant;
use App\Form\EtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function create(Request $request)
    {
        $etudiant = new Etudiant;

        $boursier = new Boursier();
        $boursier->setMontant("20000");
        $boursier->setLibelle("demi");
        $boursier->setIsHoused(true);
        $etudiant->addBouriser($boursier);
        $formEtudiant = $this->createForm(EtudiantType::class, $etudiant);
        $formEtudiant->handleRequest($request);

        if ($formEtudiant->isSubmitted() && $formEtudiant->isValid()) {
            dump($etudiant);
        }

        return $this->render('etudiant/addEtudiant.html.twig', [
            'formEtud' => $formEtudiant->createView(),
        ]);
    }
}
