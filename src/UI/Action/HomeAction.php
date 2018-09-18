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


use App\UI\Action\Interfaces\HomeActionInterface;
use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * final Class HomeAction.
 * @Route("/{_locale}", name="home", methods={"GET"}, defaults={"_locale"="fr"}, requirements={"_locale"="en|fr"})
 *
 */
final class HomeAction implements HomeActionInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(HomeResponderInterface $responder): Response
    {
        return $responder();
    }
}
