<?php
namespace App\Controller\api;

use App\Entity\UserProgression;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/currentProgression/{user_id}', methods: ['GET'])]
    public function currentProgression($user_id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $response = new Response();
        $progression = $entityManager->getRepository(UserProgression::class)->findOneBy(['userId' => $user_id]);
        if ($progression == null) {
            return new Response('User doesn\'t exist', 404);
        }
        $response->setContent(json_encode([
            'progression' => $progression->isResultat(),
            'userID' => $progression->getUserId()->getId(),
            'enigmeID' => $progression->getEnigmeId()->getId(),
        ]));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


}
