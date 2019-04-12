<?php


namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ConverterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('text', TextType::class)
        ->add('direction', ChoiceType::class, [
            'choices' => [
                'Uppercase to Lowercase' => 'toLowercase',
                'Lowercase to Uppercase' => 'toUppercase'
            ]
        ]);
    }
}


/* není tady configureOption páč to není zapojený na EntityClassu