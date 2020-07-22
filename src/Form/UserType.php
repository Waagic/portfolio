<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => "Nom *"])
            ->add('bio1', TextareaType::class, ['label' => "1ere bio"])
            ->add('bio2', TextareaType::class, ['label' => "2eme bio"])
            ->add('title', TextType::class, ['label' => "Titre *"])
            ->add('profile_picture', FileType::class, [
                'label' => 'Photo *',
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
            ->add('facebook', TextType::class)
            ->add('twitter', TextType::class)
            ->add('linkedin', TextType::class)
            ->add('github', TextType::class)
            ->add('adress', TextType::class, ['label' => "Adresse"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
