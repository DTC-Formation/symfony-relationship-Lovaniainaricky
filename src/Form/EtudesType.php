<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startDate',TypeDateType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Date Debut',
                'widget' => 'single_text',
                // Vous pouvez personnaliser les options de date selon vos besoins
                // Par exemple, 'format' pour spécifier le format d'affichage
                // 'format' => 'dd-MM-yyyy'
            ])
            ->add('endDate',TypeDateType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Date Fin',
                'widget' => 'single_text',
                // Vous pouvez personnaliser les options de date selon vos besoins
                // Par exemple, 'format' pour spécifier le format d'affichage
                // 'format' => 'dd-MM-yyyy'
            ])
            ->add('Post', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
