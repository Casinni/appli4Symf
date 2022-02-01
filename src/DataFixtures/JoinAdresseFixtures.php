<?php

namespace App\DataFixtures;
	
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


use App\Entity\Personne;
use App\Entity\Adresse;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;



class JoinAdresseFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
{
    private $container;

  

      public function setContainer(ContainerInterface $container = null)
      {
        $this->container = $container;
      }

    public function load(ObjectManager $manager)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $repPersonne=$em->getRepository(Personne::class);
        $listePersonnes=$repPersonne->findAll(); 

        foreach( $listePersonnes as $maPers ) {

            $adresse = new Adresse();

            $adresse->setNumero(rand());
            $adresse->setRue("Boulevard Victor Hugo");
            $adresse->setCodePostal(56000);
            $adresse->setVille("Vannes");
        
            $maPers->setAdresse($adresse);
            $manager->persist($maPers);
           

        }
        $manager->flush();
    }
}
