<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Personne;
use App\Entity\Livre;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class JoinLivreFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
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


            $l1 = new Livre();
            $l1->setTitre('Les Miserables');
            $l1->setEdition('Galimard');
            $l1->setAuteur('Victor Hugo');
            $l1->setInformation('Livre en bon état');
            $l2 = new Livre();
            $l2->setTitre('Le Horla');
            $l2->setEdition('Folio');
            $l2->setAuteur('Guy de Maupassant');
            $l2->setInformation('Livre en excellent état');
            $l3 = new Livre();
            $l3->setTitre('Madame Bovary');
            $l3->setEdition('jacques Neefs');
            $l3->setAuteur('Gustave Flaubert');
            $l3->setInformation('Livre en moyen état');

           
            // les jointures
            $pers=$repPersonne->findOneBy(array('nom' =>'Macron'));
            $pers->addLivre($l3);
            $pers->addLivre($l2);
            $manager->persist($pers);

            $pers=$repPersonne->findOneBy(array('nom' =>'Hugo'));
            $pers->addLivre($l1);
            $pers->addLivre($l2);
            $manager->persist($pers);

            $pers=$repPersonne->findOneBy(array('nom' =>'Valjean'));
            $pers->addLivre($l3);
            $pers->addLivre($l2);
            $pers->addLivre($l1);
            $manager->persist($pers);
          
        
        $manager->flush();
    }
}
