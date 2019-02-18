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

namespace App\Service\Interfaces;

/**
 * Interface MailerInterface.
 */
interface MailerInterface
{
    /**
     * MailerInterface constructor.
     *
     * @param \Twig_Environment $twig
     * @param \Swift_Mailer $mailer
     */
    public function __construct(
        \Twig_Environment $twig,
        \Swift_Mailer $mailer
    );

    /**
     * @param $form
     */
    public function sendMail(
        $form
    ): void;
}
