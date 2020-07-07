<?php

namespace App\Controller;

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

        if (isset($_POST['ajoutChambre'])) {
            $der = "yes";
        }
        return $this->render('chambre/addChambre.html.twig', [
            'yess' => $der,
        ]);
    }
}
