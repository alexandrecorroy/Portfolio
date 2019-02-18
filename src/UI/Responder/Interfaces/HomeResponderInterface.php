<?php

declare(strict_types=1);

/**
 * Portfolio Project
 *
 * (c) CORROY Alexandre <alexandre.corroy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Interface HomeResponderInterface.
 */
interface HomeResponderInterface
{
    /**
     * HomeResponderInterface constructor.
     *
     * @param \Twig_Environment $twig
     * @param FlashBagInterface $flashBag
     * @param RouterInterface $router
     * @param TranslatorInterface $translator
     */
    public function __construct(
        \Twig_Environment $twig,
        FlashBagInterface $flashBag,
        RouterInterface $router,
        TranslatorInterface $translator
    );

    /**
     * @param FormInterface $form
     * @param bool $contactFormIsValid
     *
     * @return Response
     */
    public function __invoke(
        FormInterface $form,
        bool $contactFormIsValid = false
    ): Response;

}
