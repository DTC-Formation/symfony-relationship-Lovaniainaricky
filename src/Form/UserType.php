<?php

namespace App\Form;

use App\Entity\Etudes;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Collection;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom' ,TextType::class,[
                'attr' => [

                    'class' => 'form-control',
                ]
            ])
            ->add('prenom',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('age',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('CIN',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('adresse',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('height',TextType::class,[
                'label' => 'Longueur ',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('weight',TextType::class,[
                'label' => 'Poids ',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('contact', ContactType::class,[
                
            ])
            ->add('etudes', CollectionType::class, [
                'entry_type' => EtudesType::class, // Le formulaire pour chaque élément de la collection
                'allow_add' => true, // Autoriser l'ajout de nouveaux éléments à la collection
                'allow_delete' => true, // Autoriser la suppression d'éléments de la collection
                'by_reference' => false, // Important pour les relations "OneToMany" et "ManyToMany"
            ])
            ->add('experiences', CollectionType::class,[
                'entry_type' => ExperienceType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
