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
            dump($chambre);
        }
        //$manage->persist($chambre);
        //$manage->flush();
        //return $this->redirectToRoute("liste_chambre");

        return $this->render('chambre/addChambre.html.twig', [
            'formChambre' => $formChambre->createView(),
        ]);
    }

    /**
     * @Route("/chambre/{id<[0-9]+>}/update", name="chambre_update", methods={"POST","GET"})
     */
    public function chambreUpdate(EntityManagerInterface $manage, Chambre $chambre)
    {
        $der = "";
        $num = "";
        if (isset($_POST['ajoutChambre'])) {
            if (empty($_POST['numero'])) {
                $der = "Veuillez entrer le numéro du Batiment";
            } else if (empty($_POST['type'])) {
                $der = "Veuillez entrer le type de chambre";
            } else {
                $num = $_POST['numero'];
                $chambre->setNumeroBat($_POST['numero']);
                $chambre->setType($_POST['type']);
                $chambre->setNumero($this->numCham($_POST['numero']));
                //dd($chambre);
                $manage->persist($chambre);
                $manage->flush();
                return $this->redirectToRoute("liste_chambre");
            }
        }
        return $this->render('chambre/addChambre.html.twig', [
            'chambre' => $chambre,
            'num' => $num,
            'yess' => $der,
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
