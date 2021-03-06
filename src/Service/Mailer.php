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
namespace App\Service;
use App\Service\Interfaces\MailerInterface;
use Twig\Environment;

/**
 * Class Mailer.
 */
final class Mailer implements MailerInterface
{
    /**
     * @var Environment
     */
    private $twig;
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * {@inheritdoc}
     */
    public function __construct(
        Environment $twig,
        \Swift_Mailer $mailer
    ) {
        $this->twig = $twig;
        $this->mailer = $mailer;
    }
    /**
     * {@inheritdoc}
     */
    public function sendMail(
        $form
    ): void {
        $message = (new \Swift_Message('Portfolio Alexandrecorroy.fr'))
            ->setFrom($_ENV['MAILER_FROM'])
            ->setTo($_ENV['MAILER_TO'])
            ->setBody(
                $this->twig->render(
                    'emails/contact.html.twig',
                    array(
                        'name' => $form['name'],
                        'phone' => $form['phone'],
                        'email' => $form['email'],
                        'message' => $form['message']
                    )
                ),
                'text/html'
            );

        $this->mailer->send($message);
    }
}
