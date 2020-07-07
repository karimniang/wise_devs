<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ChambreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre", name="chambre")
     */
    public function index()
    {
        $chambre = new Chambre();
        $formChambre = $this->createForm(ChambreType::class, $chambre);
        return $this->render('chambre/addChambre.html.twig', [
            'formCham' => $formChambre->createView(),
        ]);
    }
}
