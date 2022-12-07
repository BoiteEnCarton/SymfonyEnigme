<?php

namespace App\Utils;

use App\Entity\Enigme;
use Doctrine\ORM\EntityManagerInterface;

const REPONSE_MATHS = 2;

function checkAnswer(int $idEnigme, EntityManagerInterface $entityManager){
//    $entityManager ->getRepository(Enigme::class);
    if ($entityManager->createQuery('SELECT reponse FROM App\Entity\ReponseEnigmeUn WHERE idEnigme = :idEnigme')->setParameter('idEnigme', $idEnigme)->getResult()[0]['reponse'] == REPONSE_MATHS){
        return true;
    }
    else{return false;}
}