<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre", name="chambre")
     */
    public function index()
    {

        return $this->render('chambre/addChambre.html.twig', [
            'controller_name' => 'ChambreController',
        ]);
    }
}
