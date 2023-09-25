<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactRepository;

class ContactController extends AbstractController
{
    public function __construct(private readonly ContactRepository $contactRepository){}

    #[Route('/contacts/maries', name: 'contact_maries')]
    public function contactMaries(): Response
    {
        return $this->renderContacts('Mariés');
    }

    #[Route('/contacts/temoins', name: 'contact_temoins')]
    public function contactTemoins(): Response
    {
        return $this->renderContacts('Témoins');
    }

    private function renderContacts(string $type)
    {
        return $this->render('contact/index.html.twig', [
            'contacts' => $this->contactRepository->findBy(['type' => $type]),
            'type' => $type
        ]);
    }
}
