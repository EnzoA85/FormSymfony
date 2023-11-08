<?php

namespace App\Form;

use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\VarDumper\Cloner\Data;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance', DateType::class,[
                'data'=>new \DateTime()
            ])
            ->add('mail', EmailType::class)
            ->add('mdp', PasswordType::class)
            ->add('statutMartial', ChoiceType::class, [
                'choices' => [
                    'Celibataire' => 'celibataire',
                    'Marie' => 'marie',
                    'Divorce' => 'divorce',
                    'Veuf' => 'veuf',
                ],
            ])
            ->add('fastfood', ChoiceType::class, [
                'choices' => [
                    'Burger King' => 'burguerKing',
                    'Macdo' => 'macdo',
                    'Quick' => 'quick',
                    'KFC' => 'kfc',
                ],
                'expanded' => true,
                'multiple' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
        ]);
    }
}
