<?php

namespace App\Form;

use App\Entity\Projects;
use App\Entity\Screenshots;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('logo', FileType::class, [
                'label' => 'Logo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Il faut mettre une bonne image plz',
                    ])
                ],
            ])
            ->add('cover', FileType::class, [
                'label' => 'Cover',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Il faut mettre une bonne image plz',
                    ])
                ],
            ])
            ->add('baseline', TextType::class, ['label' => 'Sous titre'])
            ->add('description1', TextareaType::class, ['label' => 'Description 1'])
            ->add('description2', TextareaType::class, ['label' => 'Description 2'])
            ->add('link', TextType::class, ['label' => 'Lien'])
            ->add('screenshots', CollectionType::class, [
                'entry_type' => ScreenshotType::class,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
