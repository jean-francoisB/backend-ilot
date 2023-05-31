<?php

namespace App\Form;

use App\Entity\Festivite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FestiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ["required"=>false])
            ->add('texte', CKEditorType::class)
            ->add('isActive', CheckboxType::class, ['required' => false, 'label' =>'Actif', 'row_attr' => ["class" =>'form-switch']])
            ->add('updatedAt', DateTimeType::class, ["widget" => "single_text", "label" => "Mise a jour"])
            ->remove('imageName')
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
            'data_class' => Festivite::class,
            'edit' => false,
        ]);
    }
}
