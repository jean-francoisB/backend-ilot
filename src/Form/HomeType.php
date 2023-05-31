<?php

namespace App\Form;

use App\Entity\Home;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isActive', CheckboxType::class, ['required' => false, 'label' =>'Actif', 'row_attr' => ["class" =>'form-switch']])
            ->add('titre', TextType::class)
            ->add('texte', CKEditorType::class)
            ->add('signature')
            ->add('imageFile', FileType::class, ['required' => false, 'label' => 'Image'])
            ->remove('imageName')
            ->remove('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}
