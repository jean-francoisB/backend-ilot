<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ["required"=>true])
            ->remove('roles')
            ->add('password')
            ->add('nom',TextType::class, ["required"=>false])
            ->add('prenom',TextType::class, ["required"=>false])
            ->add('adresse',TextType::class, ["required"=>false, "label" => "Adresse"])
            ->add('codePostal',TextType::class, ["required"=>false])
            ->add('ville',TextType::class, ["required"=>false])
            ->add('telephone', TextType::class, ["required"=>false])
            ->remove('enfants')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
