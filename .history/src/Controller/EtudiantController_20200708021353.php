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

        $boursier = new Boursier();
        $nonBoursier = new NonBoursier();

        $etudiant->setBoursier($boursier);
        $etudiant->setNonBoursier($nonBoursier);
        $formEtudiant = $this->createForm(EtudiantType::class, $etudiant);
        $formEtudiant->handleRequest($request);

        if ($formEtudiant->isSubmitted()) {
            if (false === $etudiant->getBoursier($boursier)) {

                $manager->remove($boursier);
            } else if (false === $etudiant->getNonBoursier($nonBoursier)) {
                $manager->remove($nonBoursier);
            }
            $manager->persist($etudiant);
            $manager->flush();
        }

        return $this->render('etudiant/addEtudiant.html.twig', [
            'formEtud' => $formEtudiant->createView(),
        ]);
    }
}
