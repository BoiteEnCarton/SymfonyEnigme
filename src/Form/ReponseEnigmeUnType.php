<?php

namespace App\Form;

use App\Entity\ReponseEnigmeUn;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ReponseEnigmeUnType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Reponse', TextareaType::class, [
                'label' => 'Entrez votre réponse',

                'attr' => [
                    'placeholder' => 'Votre réponse',
                    'class' => 'form-control',
//                    'rows' => 5,
//                    'cols' => 33,
                    'style' => 'resize:none',
//                    'maxlength' => 255,
//                    'minlength' => 1,
//                    'required' => true,
                    'autofocus' => true,
//                    'autocomplete' => 'off',
//                    'spellcheck' => false,
//                    'wrap' => 'hard',
//                    'pattern' => '[a-zA-Z0-9]+',
                    'title' => 'Caractères autorisés : 0-9',
//                    'onreset' => "this.form.reset();",
//                    'onsubmit' => "return false;",
//                    'onsubmit' => "print('test');",
//                    'onsubmit' => "alert('test');",

                ],])
                ->add('submit', SubmitType::class, [
                    'label' => 'Envoyer',
                    'attr' => [
                        'class' => 'envoyerBouton',
                    ],
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReponseEnigmeUn::class,
        ]);
    }
}
