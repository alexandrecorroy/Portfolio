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

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface HomeActionInterface.
 */
interface HomeActionInterface
{
    /**
     * @param Request $request
     * @param HomeResponderInterface $responder
     *
     * @return Response
     */
    public function __invoke(
        Request $request,
        HomeResponderInterface $responder
    ): Response;
}
