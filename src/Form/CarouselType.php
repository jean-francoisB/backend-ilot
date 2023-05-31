<?php

namespace App\Form;

use App\Entity\Carousel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CarouselType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->remove('imageName')
            ->add('tag', ChoiceType::class, ["choices" => ["home" =>"Home"]])
            ->remove('updatedAt', DateTimeType::class, ["widget" => "single_text", "label" => "Mise a jour"])
            ->add('titre', TextType::class, ["required" => false])
            ->add('texte', TextType::class, ["required"=>false])
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
            'data_class' => Carousel::class,
            'edit' => false,
        ]);
    }
}
