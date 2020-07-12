<?php

namespace App\Controller;

use App\Entity\Boursier;
use App\Entity\Etudiant;
use App\Entity\NonBoursier;
use App\Form\EtudiantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $etudiant = new Etudiant;


        $formEtudiant = $this->createForm(EtudiantType::class, $etudiant);
        $formEtudiant->handleRequest($request);

        if ($formEtudiant->isSubmitted()) {

            //$manager->persist($etudiant);
            //$manager->flush();
        }

        return $this->render('etudiant/addEtudiant.html.twig', [
            'formEtud' => $formEtudiant->createView(),
        ]);
    }

    public function matriculeEtudiant($nom, $prenom)
    {
        $cc = substr($nom, 2);
        $ll = substr($prenom, -2);
        $num2 = rand(1000, 9999);
        $numReturn = '2020-' . $cc . $ll . '-' . $num2;
        return $numReturn;
    }
}
