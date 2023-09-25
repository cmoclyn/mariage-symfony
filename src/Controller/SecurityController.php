<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function publicLogin(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->login($authenticationUtils, 'invité', 'app_index');
    }

    #[Route('/admin/login', name: 'admin_login')]
    public function adminLogin(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->login($authenticationUtils, 'admin', 'admin');
    }

    #[Route('/logout', name: 'logout', methods: ['GET', 'POST'])]
    public function logout(): never
    {
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }

    private function login(AuthenticationUtils $authenticationUtils, string $username, string $target): Response
    {
        return $this->render('security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'username'      => $username,
            'target'        => $target,
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }
}
