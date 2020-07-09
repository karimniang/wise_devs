<?php

namespace App\Controller;

use App\Repository\ChambreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListeChambreController extends AbstractController
{

    public function liste(ChambreRepository $chambreRepository)
    {
    }
}
