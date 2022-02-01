<?php

namespace App\Form;

use App\Entity\Personne;
use App\Entity\Adresse;
use App\Entity\Livre;
use App\Entity\AchatProduits;
use App\Form\AdresseType;
use App\Form\LivreType;
use App\Form\AchatProduitsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType ::class,array('label'=> 'Nom : '))
            ->add('prenom',TextType ::class,array('label'=>  'Prénom : '))
            ->add('dateNaiss',DateType::class, array('label'=>'Date de naissance:',   'widget' => 'single_text'))
            ->add('email', EmailType::class, array('label'=>'Email:'))
            ->add('telephone',TextType ::class,array('label'=>'Téléphone:'))
            ->add('login',TextType ::class,array('label'=> 'Login : '))
            ->add('pwd',PasswordType ::class,array('label'=> 'Mot de passe : '))
            ->add('adresse',AdresseType::class,array('label'=> 'Adresse : '))
           //->add('livres',CollectionType::class,array('entry_type'=>LivreType::class,'allow_add'=>true,'allow_delete'=>true))
            ->add('livres',EntityType::class,array(
                'class' => Livre::class,
                  'choice_label'=>'Titre',
                'label' =>'Selection des Livres',
                'multiple' => true,
                'required' => false             
            ))
            ->add('achatProduits',CollectionType::class,array('entry_type'=>AchatProduitsType::class,'allow_add'=>true,'allow_delete'=>true))
                ;

            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
