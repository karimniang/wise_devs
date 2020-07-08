<?php

namespace App\Form;

use App\Entity\Boursier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoursierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('montant')
            ->add('isHoused')
            ->add('loger')
            ->add('EtudiantBoursier');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Boursier::class,
        ]);
    }
}
