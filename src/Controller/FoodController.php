<?php

namespace App\Controller;

use App\Repository\FoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FoodController extends AbstractController
{
    public function __construct(private readonly FoodRepository $foodRepository){}

    #[Route('/food', name: 'food_index')]
    public function index(): Response
    {
        $viandes = $this->foodRepository->findBy(['type' => 'Viande']);
        $poissons = $this->foodRepository->findBy(['type' => 'Poisson']);
        $garnitures = $this->foodRepository->findBy(['type' => 'Garniture']);
        return $this->render('food/index.html.twig', [
            'viandes' => $viandes,
            'poissons' => $poissons,
            'garnitures' => $garnitures,
        ]);
    }
}
