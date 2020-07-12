<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ChambreType;
use App\Repository\ChambreRepository;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre", name="chambre", methods={"POST","GET"})
     */
    public function chambreCreate(Request $request, EntityManagerInterface $manage)
    {
        $chambre = new Chambre();

        $formChambre = $this->createForm(ChambreType::class, $chambre);
        $formChambre->handleRequest($request);
        if ($formChambre->isSubmitted() && $formChambre->isValid()) {
            $chambre->setNumero($this->numCham($chambre->getNumeroBat()));
            //dump($chambre);
            $manage->persist($chambre);
            $manage->flush();
            return $this->redirectToRoute("liste_chambre");
        }

        return $this->render('chambre/addChambre.html.twig', [
            'formChambre' => $formChambre->createView(),
        ]);
    }

    /**
     * @Route("/liste_chambre", name="liste_chambre")
     */

    public function lister(ChambreRepository $chambreRepository)
    {
        $chambres = $chambreRepository->findAll();
        //dd($chambres);

        return $this->render('liste_chambre/lsChambre.html.twig', compact('chambres'));
    }

    /**
     * @Route("/chambre/{id<[0-9]+>}/update", name="chambre_update", methods={"POST","GET"})
     */
    public function chambreUpdate(Request $request, EntityManagerInterface $manage, Chambre $chambre)
    {
        $formChambre = $this->createForm(ChambreType::class, $chambre);
        $formChambre->handleRequest($request);
        if ($formChambre->isSubmitted() && $formChambre->isValid()) {
            $chambre->setNumero($this->numCham($chambre->getNumeroBat()));
            //dump($chambre);
            //$manage->persist($chambre);
            $manage->flush();
            return $this->redirectToRoute("liste_chambre");
        }

        return $this->render('chambre/addChambre.html.twig', [
            'chambre' => $chambre,
            'formChambre' => $formChambre->createView(),
        ]);
    }

    public function numCham($num)
    {
        $num2 = rand(1000, 9999);
        $num = str_pad($num, 3, "0", STR_PAD_LEFT);
        $numReturn = $num . '-' . $num2;
        return $numReturn;
    }

    /**
     * @Route("/chambre/{id<[0-9]+>}/delete", name="chambre_delete")
     */

    public function deleteChambre(EntityManagerInterface $manager, Chambre $chambre, EtudiantRepository $etudiantRepository)
    {
        $etudiants = $etudiantRepository->findAll();
        //dd($chambre->getId());
        for ($i = 0; $i < count($etudiants); $i++) {
            dump($etudiants[$i]->getPrenom());
        }
        return $this->redirectToRoute("liste_chambre");
    }
}
