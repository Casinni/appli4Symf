<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\data\ListeAdresses;
use App\Entity\Adresse;


class AdresseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
               //$mesPersonnes est le tableau statique de ListePersonnes contenant les données de personnes
               foreach(ListeAdresses::$mesAdresses as $monAdresse){
          
                $ad=new Adresse();
                $ad->setNumero($monAdresse['numero']);
                $ad->setRue($monAdresse['rue']);
                $ad->setCodepostal($monAdresse['codepostal']);
                $ad->setVille($monAdresse['ville']);
                $ad->setIdpers($monAdresse['id_pers']);
              
                //pour assurer la persistance , il faut utiliser l'objectManager
                $manager->persist($ad);
    
            }
    
        $manager->flush();
    }
}
