<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $dateWedding = new DateTime('2024-08-17');
        $dateNow = new DateTime();
        $daysLeft = $dateNow->diff($dateWedding)->format('%a');

        return $this->render('index/index.html.twig', [
            'daysLeft' => $daysLeft
        ]);
    }

    #[Route('/access', name: 'access')]
    public function access(): Response
    {
        return $this->render('index/access.html.twig');
    }
}
