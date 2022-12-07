<?php

namespace App\Controller;

use App\Entity\Enigme;
use App\Entity\ReponseEnigmeUn;
use App\Form\ReponseEnigmeUnType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function App\Utils\checkAnswer;

class ReponseEnigmeUnController extends AbstractController
{

    #[Route('/reponse/enigme/un', name: 'app_reponse_enigme_un')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
//        checkAnswer(1, $entityManager);
//        $reponse = $request->get('answer');


        $matiere = "Maths";
        $reponseForm = new ReponseEnigmeUn();
        $enigmes = $entityManager->getRepository(Enigme::class);
        $reponseForm->setIdEnigme($enigmes->findOneBy(['titre' => $matiere]));



        $form = $this->createForm(ReponseEnigmeUnType::class, $reponseForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reponseForm);
            $entityManager->flush();
            return $this->redirectToRoute('app_reponse_enigme_un');
        }





        return $this->render('reponse_enigme_un/index.html.twig', [
//            'controller_name' => 'ReponseEnigmeUnController',
            'reponseForm' => $form->createView(),
        ]);
    }
}
