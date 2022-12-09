<?php

namespace App\Form;

use App\Entity\ReponseEnigmeUn;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReponseEnigmeUnType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Reponse', TextareaType::class, [
                'label' => 'Entrez votre réponse',
                'attr' => [
                    'placeholder' => 'Votre réponse',
                    'class' => 'form-control'
                ]
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReponseEnigmeUn::class,
        ]);
    }
}
