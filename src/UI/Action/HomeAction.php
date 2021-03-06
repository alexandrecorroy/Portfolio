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

namespace App\UI\Action;

use App\Form\ContactType;
use App\Service\Interfaces\MailerInterface;
use App\UI\Action\Interfaces\HomeActionInterface;
use App\UI\Responder\Interfaces\HomeResponderInterface;
use ReCaptcha\ReCaptcha;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * final Class HomeAction.
 * @Route(
 *     "/{_locale}",
 *     name="home",
 *     methods={"GET","POST"},
 *     locale="fr",
 *     format="html",
 *     requirements={
 *         "_locale": "en|fr"
 *     }
 * )
 *
 */
final class HomeAction implements HomeActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * {@inheritDoc}
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        MailerInterface $mailer,
    ) {
        $this->formFactory      = $formFactory;
        $this->mailer           = $mailer;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        Request $request,
        HomeResponderInterface $responder
    ): Response {

        $form = $this->formFactory->create(ContactType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

                $this->mailer->sendMail($form->getData());
                return $responder($form, true);

        }

        return $responder($form);
    }
}
