<?php

namespace App\Form;

use App\Entity\Experience;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startDate',TypeDateType::class, [
                'label' => 'Date Debut',
                'attr' => [
                    'class' => 'form-control',
                ],
                'widget' => 'single_text',
                // Vous pouvez personnaliser les options de date selon vos besoins
                // Par exemple, 'format' pour spécifier le format d'affichage
                // 'format' => 'dd-MM-yyyy'
            ])
            ->add('EndDate',TypeDateType::class, [
                'label' => 'Date Debut',
                'attr' => [
                    'class' => 'form-control',
                ],
                'widget' => 'single_text',
                // Vous pouvez personnaliser les options de date selon vos besoins
                // Par exemple, 'format' pour spécifier le format d'affichage
                // 'format' => 'dd-MM-yyyy'
            ])
            ->add('Post', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Nom Travail : '
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
}
