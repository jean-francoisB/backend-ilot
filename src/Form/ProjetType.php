<?php

namespace App\Form;

use App\Entity\Projet;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ["required"=>false])
            ->add('texte', CKEditorType::class)
            ->remove('imageName')
            ->add('isActive', CheckboxType::class, ['required' => false, 'label' =>'Actif', 'row_attr' => ["class" =>'form-switch']])
            ->add('updatedAt', DateTimeType::class, ["widget" => "single_text", "label" => "Mise a jour"])
        ;
        if($options["edit"]){
            $builder->add('imageFile', FileType::class, ["label"=>"Image", "required"=>false]);
        }else{
            $builder->add('imageFile', FileType::class, ["label"=>"Image" , "required"=>true]);
        }

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
            'edit' => false,
        ]);
    }
}