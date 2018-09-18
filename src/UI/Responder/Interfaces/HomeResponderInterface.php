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

use Symfony\Component\HttpFoundation\Response;

/**
 * Interface HomeResponderInterface.
 */
interface HomeResponderInterface
{
    /**
     * HomeResponderInterface constructor.
     *
     * @param \Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig);

    /**
     * @return Response
     */
    public function __invoke(): Response;

}
