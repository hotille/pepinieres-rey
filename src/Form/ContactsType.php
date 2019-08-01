<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ContactsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie', ChoiceType::class, [
                'choices' => [
                    'Professionel' => 'professionel',
                    'Particulier' => 'particulier'
                ],
                'placeholder' => 'Choisir une catégorie'
            ])
            ->add('siret')
            ->add('prenom')
            ->add('nom')
            ->add('email')
            ->add('message')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
