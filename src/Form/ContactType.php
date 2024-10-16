<?php

namespace App\Form;

use App\DTO\ContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'empty_data' => '',
                'label' => 'Nom'
            ])
            ->add('email', EmailType::class, [
                'empty_data' => '',
                'label' => 'Email'
            ])
            ->add('message', TextareaType::class, [
                'empty_data' => '',
                'label' => 'Message'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer'
            ])
            ->add('service', ChoiceType::class, [
                'choices' => [
                    'Comptabilité' => 'comptabilite@demo.com',
                    'Marketing' => 'marketing@demo.com',
                    'Support' => 'support@demo.com',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactDTO::class,
        ]);
    }
}
