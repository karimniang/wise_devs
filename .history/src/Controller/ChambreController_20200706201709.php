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
                dd($chambre);
                //$der = "toooo";
            }
        }
        return $this->render('chambre/addChambre.html.twig', [
            'num' => $num,
            'yess' => $der,
        ]);
    }
    public function numCham($num)
    {
        $num2 = rand(1000, 9999);
        if (strlen($num) == 1) {
            $new = '00' . $num;
        } else if (strlen($num) == 2) {
            $new = '0' . $num;
        } else {
            $new = $num;
        }
        $numReturn = $new . '-' . $num2;
        return $numReturn;
    }
}
