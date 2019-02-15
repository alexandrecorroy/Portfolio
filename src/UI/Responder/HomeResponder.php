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
use Symfony\Component\HttpFoundation\Response;

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
     * {@inheritdoc}
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(): Response
    {
        $template = $this->twig->render('base.html.twig');

        return new Response($template);
    }

}
