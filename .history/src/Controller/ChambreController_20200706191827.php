<?php

namespace App\Controller;

use App\Entity\Chambre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre", name="chambre", methods={"POST","GET"})
     */
    public function chambreCreate()
    {
        $chambre = new Chambre();
        $der = "";
        if (isset($_POST['ajoutChambre'])) {
            if (empty($_POST['numero'])) {
                $der = "Veuillez entrer le numéro du Batiment";
            } else if (empty($_POST['type'])) {
                $der = "Veuillez entrer le type de chambre";
            } else {
                $der = "toooo";
            }
        }
        return $this->render('chambre/addChambre.html.twig', [
            'num' => $_POST['numero'],
            'yess' => $der,
        ]);
    }
}
