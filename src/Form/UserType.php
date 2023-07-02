<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, [
                "attr" => [
                    "class" => "form-control col-sm-9",
                    "placeholder" => "atsofoy ny nom anao"
                ]
            ])
            ->add('prenom',TextType::class, [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "atsofoy ny prenom anao"
                ]
            ])
            ->add('age',TextType::class, [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "atsofoy ny age anao"
                ]
            ])
            ->add('CIN',TextType::class, [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "atsofoy ny CIN anao"
                ]
            ])
            ->add('adresse',TextType::class, [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "atsofoy ny adresse anao"
                ]
            ])
            ->add('height',NumberType::class, [
                "attr" => [
                    "class" => "height-input form-control",
                    "placeholder" => "atsofoy ny metatra anao",
                    'input' => 'number'
                ]
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
