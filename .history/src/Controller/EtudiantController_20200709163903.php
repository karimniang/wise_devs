<?php

namespace App\Controller;

use App\Entity\Boursier;
use App\Entity\Etudiant;
use App\Entity\NonBoursier;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
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
            $etudiant->setMatricule($this->matriculeEtudiant($etudiant->getNom(), $etudiant->getPrenom()));
            if (!empty($etudiant->getMontant())) {
                //$etudiant->setLibelle($this->libelleEtudiant($etudiant->getMontant()));
                //$manager->persist($etudiant);
                //$manager->flush();
                dump($etudiant);
            } else {
                dump($etudiant);
                $manager->persist($etudiant);
                $manager->flush();
            }
            //$manager->persist($etudiant);
            //$manager->flush();
            //dump($etudiant);
        }

        return $this->render('etudiant/addEtudiant.html.twig', [
            'formEtud' => $formEtudiant->createView(),
        ]);
    }

    public function matriculeEtudiant($nom, $prenom)
    {
        $cc = substr($nom, 0, 2);
        $ll = substr($prenom, -2);
        $num2 = rand(1000, 9999);
        $numReturn = '2020-' . $cc . $ll . '-' . $num2;
        return $numReturn;
    }

    public function libelleEtudiant($montant)
    {
        if ($montant == "20000") {
            return "Demi-bourse";
        } elseif ($montant == "40000") {
            return "Bourse-entiere";
        }
    }

    /**
     * @Route("/liste_etudiant", name="liste_etudiant")
     */
    public function liste(EtudiantRepository $etudiantRepository)
    {
        $etudiants = $etudiantRepository->findAll();
        return $this->render('liste_etudiant/lsEtudiant.html.twig', compact($etudiants));
    }
}
