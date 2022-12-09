<?php

namespace App\Utils;

use App\Entity\Enigme;
use App\Entity\ReponseEnigmeUn;
use Doctrine\ORM\EntityManagerInterface;

const REPONSE_MATHS = 2;

function checkAnswer(int $idEnigme, EntityManagerInterface $entityManager, ): string
{
    $repo = $entityManager->getRepository(ReponseEnigmeUn::class);
//    return $repo->findOneBy(["idEnigme" => $idEnigme])->getReponse();
    if($repo->findOneBy(["idEnigme" => $idEnigme])->getReponse() == REPONSE_MATHS ){
        return true;
    } else {
        return false;
    }
}
