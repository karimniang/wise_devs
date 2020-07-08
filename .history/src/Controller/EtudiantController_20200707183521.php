<?php

namespace App\Controller;

use App\Entity\Boursier;
use App\Entity\Etudiant;
use App\Entity\NonBoursier;
use App\Form\BoursierType;
use App\Form\EtudiantType;
use App\Form\NonBoursierType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function create(Request $request)
    {
        $etudiant = new Etudiant;
        $bourse = new Boursier;
        $nonBourse = new NonBoursier;
        $formEtudiant = $this->createForm(EtudiantType::class, $etudiant);
        $formEtudiant->handleRequest($request);
        $formBourse = $this->createForm(BoursierType::class, $bourse);
        $formNonBourse = $this->createForm(NonBoursierType::class, $nonBourse);


        $formBourse->handleRequest($request);
        $formNonBourse->handleRequest($request);

        if ($formEtudiant->isSubmitted() && $formEtudiant->isValid()) {
            dd($etudiant);
        }

        return $this->render('etudiant/addEtudiant.html.twig', [
            'formEtud' => $formEtudiant->createView(),
            'formBourse' => $formBourse->createView(),
            'formNonBourse' => $formNonBourse->createView(),
        ]);
    }
}
