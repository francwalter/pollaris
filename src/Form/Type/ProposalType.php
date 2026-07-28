<?php
// fcw: 2026-03-08: Mit Gemini erweitert: https://gemini.google.com/app/8e6cc1756142038f
// ew6: Pollaris: Individuelle Terminlimits hinzufügen
//
// This file is part of Pollaris.
// Copyright 2024-2026 Marien Fressinaud
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace App\Form\Type;

use App\Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\TranslatableMessage;

class ProposalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label', Type\TextType::class, [
                'trim' => true,
                'empty_data' => '',
                'label' => new TranslatableMessage('forms.proposal_type.label.label_pattern'),
                'attr' => [
                    'maxlength' => Entity\Proposal::MAX_LABEL_LENGTH,
                ],
            ])
            // Das neue Feld für das individuelle Limit pro Termin:
            ->add('maxVotes', Type\IntegerType::class, [
                'required' => false,
                'label' => new TranslatableMessage('forms.proposal_type.max_votes.label'),
                'attr' => [
                    'min' => 1,
                    'placeholder' => new TranslatableMessage('forms.proposal_type.max_votes.placeholder'),
                    'style' => 'max-width: 150px;'
                ],
                'help' => new TranslatableMessage('forms.proposal_type.max_votes.help'),
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entity\Proposal::class,
        ]);
    }
}
