<?php

namespace App\Controller;

use App\Repository\LodgingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LodgingController extends AbstractController
{
    public function __construct(private readonly LodgingRepository $lodgingRepository){}

    #[Route('/lodging', name: 'app_lodging')]
    public function index(): Response
    {
        $lodgings = $this->lodgingRepository->findAll();
        return $this->render('lodging/index.html.twig', [
            'lodgings' => $lodgings,
        ]);
    }
}
