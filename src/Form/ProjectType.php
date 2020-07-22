<?php

namespace App\Form;

use App\Entity\Projects;
use App\Entity\Screenshots;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('logo')
            ->add('baseline')
            ->add('description1')
            ->add('description2')
            ->add('link')
            ->add('screenshots', CollectionType::class, [
                'entry_type' => ScreenshotType::class,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'delete_empty' => function (Screenshots $screenshots = null) {
                    return null === $screenshots || empty($screenshots->getFile());
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
