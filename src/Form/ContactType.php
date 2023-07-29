<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('telephone',TextType::class,[
                "label" => "Numéro télephone : ",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('mail',TextType::class,[
                "label" => "Adresse Email : ",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('linkedIn',TextType::class,[
                "label" => "Site LinkedIn : ",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            // ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
