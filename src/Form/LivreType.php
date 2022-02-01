<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',TextType ::class,array('label'=> 'Titre : '))
            ->add('edition',TextType ::class,array('label'=> 'Edition : '))
            ->add('information',TextType ::class,array('label'=> 'Information : '))
            ->add('auteur',TextType ::class,array('label'=> 'Auteur : '))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
