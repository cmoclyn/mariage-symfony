<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('object', ChoiceType::class, [
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'choices' => [
                    'Je viens au mariage' => 'Je viens au mariage',
                    'Je ne viens pas au mariage :(' => 'Je ne viens pas au mariage :(',
                    'Je voudrais indiquer une allergie alimentaire' => 'Je voudrais indiquer une allergie alimentaire',
                    'J\'ai des questions' => 'J\'ai des questions',
                    'Je voudrais participer à des activités' => 'Je voudrais participer à des activités',
                    'Autre' => 'Autre',
                ],
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])
            ->add('text', TextareaType::class, [
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 6
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
