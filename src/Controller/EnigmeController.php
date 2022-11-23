<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnigmeController extends AbstractController
{
    #[Route('/enigme', name: 'app_enigme')]
    public function index(): Response
    {
        return $this->render('enigme/index.html.twig', [
            'controller_name' => 'EnigmeController',
        ]);
    }
}
