<?php

namespace App\Controller;

use App\Entity\Timeline;
use App\Repository\TimelineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TimelineController extends AbstractController
{
    public function __construct(private readonly TimelineRepository $timelineRepository){}

    #[Route('/timeline/{name}', name: 'timeline_show')]
    public function show(Timeline $timeline): Response
    {
        return $this->render('timeline/show.html.twig', [
            'timeline' => $timeline
        ]);
    }

    public function menu(): Response
    {
        return $this->render('timeline/menu.html.twig', [
            'timelines' => $this->timelineRepository->findAll()
        ]);
    }
}
