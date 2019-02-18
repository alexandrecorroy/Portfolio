<?php

declare(strict_types=1);

/**
 * TodoList Project
 *
 * (c) CORROY Alexandre <alexandre.corroy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class ContactType.
 */
class ContactType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'error.not_blank']),
                ],
                'label' => 'contact.name',
                'attr' => [
                    'placeholder' => 'contact.name',
                    'class' => 'form-control'
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'error.not_blank']),
                    new Email(['message' => 'error.not_email'])
                ],
                'label' => 'contact.email',
                'attr' => [
                    'placeholder' => 'contact.email',
                    'class' => 'form-control'
                ]
            ])
            ->add('phone', TextType::class, [
                'required' => false,
                'label' => 'contact.phone',
                'attr' => [
                    'placeholder' => 'contact.phone',
                    'class' => 'form-control'
                ]
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'error.not_blank']),
                ],
                'label' => 'contact.message',
                'attr' => [
                    'placeholder' => 'contact.message',
                    'class' => 'form-control'
                ]
            ])
        ;
    }
}
