<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WIPController extends AbstractController
{
    #[Route('/wip', name: 'app_wip')]
    public function index(): Response
    {
        return $this->render('wip/index.html.twig', [
            'controller_name' => 'WIPController',
        ]);
    }
}
