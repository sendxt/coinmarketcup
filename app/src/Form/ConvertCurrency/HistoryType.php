<?php

namespace App\Form\ConvertCurrency;

use App\Constants\Currency;
use App\Request\ConvertCurrency\HistoryRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HistoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('from', ChoiceType::class, [
                'choices' => Currency::ALL_CHOICES,
                'label' => 'currency',
            ])
            ->add('to', TextType::class, ['label' => 'crypto'])
            ->add('amount', NumberType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HistoryRequest::class,
        ]);
    }
}
