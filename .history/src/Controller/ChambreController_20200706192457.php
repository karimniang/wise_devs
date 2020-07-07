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
        $num = "";
        $numBat = $_POST['numero'];
        $type = $_POST['type'];
        if (isset($_POST['ajoutChambre'])) {
            if (empty($_POST['numero'])) {
                $der = "Veuillez entrer le numéro du Batiment";
            } else if (empty($_POST['type'])) {
                $der = "Veuillez entrer le type de chambre";
            } else {
                $num = $_POST['numero'];
                $der = "toooo";
            }
        }
        return $this->render('chambre/addChambre.html.twig', [
            'num' => $num,
            'yess' => $der,
        ]);
    }
}
