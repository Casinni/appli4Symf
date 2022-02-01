<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Personne;
use App\Entity\AchatProduits;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class JoinAchatProduitsFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
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


            $a1 = new AchatProduits();
            $a1->setNom('smartphone Android Pixel');
            $a1->setPrix(458.12);
            $a1->setNombre(1);
       
            $a2 =  new AchatProduits();
            $a2->setNom('ordinateur HP i5');
            $a2->setPrix(1250.50);
            $a2->setNombre(2);
         
            $a3 =  new AchatProduits();
            $a3->setNom('Livre sur Symfony');
            $a3->setPrix(45.90);
            $a3->setNombre(1);
           
           
            // les jointures
            $pers=$repPersonne->findOneBy(array('nom' =>'Macron'));
            $pers->addAchatProduit($a1);

            $manager->persist($pers);

            $pers=$repPersonne->findOneBy(array('nom' =>'Hugo'));
            $pers->addAchatProduit($a1);
            $pers->addAchatProduit($a2);

            $manager->persist($pers);

            $pers=$repPersonne->findOneBy(array('nom' =>'Valjean'));
            $pers->addAchatProduit($a1);
            $pers->addAchatProduit($a3);
 
            $manager->persist($pers);
          
        
        $manager->flush();
    }
}
