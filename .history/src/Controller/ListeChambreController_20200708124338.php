<?php

namespace App\Controller;

use App\Repository\ChambreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListeChambreController extends AbstractController
{
    /**
     * @Route("/liste_chambre", name="liste_chambre")
     */
    public function index(ChambreRepository $chambreRepository)
    {
        $chambres = $chambreRepository->findAll();
        dump(json_encode($chambres));
        //dd($chambres);
        return $this->render('liste_chambre/lsChambre.html.twig', compact('chambres'));
    }
}
