<?php

namespace App\Form;

use App\Entity\Student;
use App\Entity\Classroom;
use App\Entity\Club;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NSC')
            ->add('Email')
            ->add(
                'classroom',
                EntityType::class,
                [
                    'class' => Classroom::class,
                    'choice_label' => 'name',
                    'multiple' => false,
                    'expanded' => false,
                ]
                );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
