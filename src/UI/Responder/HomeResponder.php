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

namespace App\UI\Responder;


use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * final Class HomeResponder.
 */
final class HomeResponder implements HomeResponderInterface
{

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var FlashBagInterface
     */
    private $flashBag;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        \Twig_Environment $twig,
        FlashBagInterface $flashBag,
        RouterInterface $router,
        TranslatorInterface $translator
    ) {
        $this->twig       = $twig;
        $this->flashBag   = $flashBag;
        $this->router     = $router;
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        FormInterface $form,
        bool $contactFormIsValid = false
    ): Response {
        if($contactFormIsValid)
        {
            $this->flashBag->add('notice', $this->translator->trans('flash.email.success'));
            return new RedirectResponse($this->router->generate('home', [ '_fragment'  =>  'contact' ]));
        }

        $template = $this->twig->render('base.html.twig', array(
            'form' => $form->createView(),
        ));

        return new Response($template);
    }

}
