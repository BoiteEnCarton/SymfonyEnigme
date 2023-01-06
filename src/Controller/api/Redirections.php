<?php

class Redirections extends AbstractController{
    #[Route('/enigme2Validation/{user_id}', name: 'enigme2Validation')]
    public function enigme2Validation($user_id, EntityManagerInterface $entityManager): Response
    {
        $userProg = $entityManager->getRepository(UserProgression::class)->findOneBy(['userId' => $this->getUser()->getId()]);
        $userProg->setProgression(2);
        $entityManager->persist($userProg);
        $entityManager->flush();
        return $this->redirectToRoute('app_home');
    }
}
