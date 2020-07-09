<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ChambreType;
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
     * @Route("/chambre/{id<[0-9]+>}/update", name="chambre_update", methods={"POST","GET"})
     */
    public function chambreUpdate(Request $request, EntityManagerInterface $manage, Chambre $chambre)
    {
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
}
