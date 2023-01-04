<?php
namespace App\Controller\api;

use App\Entity\Enigme;
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
        $entityManager->flush();
        if ($progression == null) {
            return new Response('Cet utilisateur n\'existe pas', 404);
        }
        $response->setContent(json_encode([
            'progression' => $progression->isResultat(),
            'userID' => $progression->getUserId()->getId(),
            'enigmeID' => $progression->getEnigmeId()->getId(),
        ]));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    #[Route('/api/validateEnigma/{id_enigme}/{id_utilisateur}', methods: ['PATCH'])]
    public function validateEnigma($id_enigme, $id_utilisateur, Request $request, EntityManagerInterface $entityManager): Response
    {
        $response = new Response();
        $progression = $entityManager->getRepository(UserProgression::class)->findOneBy(['userId' => $id_utilisateur]);
        $enigme = $entityManager->getRepository(Enigme::class)->findOneBy(['id' => $id_enigme]);
        if ($progression == null) {
            return new Response('Cet utilisateur n\'existe pas', 404);
        }
        if ($progression->getEnigmeId()->getId() < $id_enigme) {
            $progression->setEnigmeId($enigme);
            $entityManager->persist($progression);
        }
        $entityManager->flush();
        $response->setContent(json_encode([
            'progression' => $progression->isResultat(),
            'userID' => $progression->getUserId()->getId(),
            'enigmeID' => $progression->getEnigmeId()->getId(),
        ]));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
