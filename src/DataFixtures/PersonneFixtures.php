<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\data\ListePersonnes;
use App\Entity\Personne;


class PersonneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
               //$mesPersonnes est le tableau statique de ListePersonnes contenant les données de personnes
               foreach(ListePersonnes::$mesPersonnes as $maPersonne){
                $dt = new \DateTime('now - 30 years');
                $personne=new Personne();
                $personne->setNom($maPersonne['nom']);
                $personne->setPrenom($maPersonne['prenom']);
                $personne->setDateNaiss($dt);
                $personne->setTelephone($maPersonne['telephone']);
                $personne->setEmail($maPersonne['email']);
                $personne->setLogin($maPersonne['login']);
                $personne->setPwd($maPersonne['pwd']);
                //pour assurer la persistance , il faut utiliser l'objectManager
                $manager->persist($personne);
    
            }
    
        $manager->flush();
    }
}
