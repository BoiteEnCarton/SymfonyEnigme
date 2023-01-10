<?php

namespace App\Controller\api;

use App\Entity\UserProgression;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Redirections extends AbstractController{
    #[Route('/enigme2validation', name: 'enigme2Validation')]
    public function enigme2Validation(EntityManagerInterface $entityManager)
    {
        $userProg = $entityManager->getRepository(UserProgression::class)->findOneBy(['userId' => $this->getUser()->getId()]);
        $userProg->setProgression(2);
        $entityManager->persist($userProg);
        $entityManager->flush();
        return $this->redirectToRoute('app_wip');
    }
}
