<?php

declare(strict_types=1);

namespace App\Controller\Match;

use http\Env\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetMatchController
{
    /**
     * @Route("/api/matches", methods={"GET"})
     */
    public function __invoke()
    {
        $requestContent = \json_decode($request->getContent());

        $requestContent

    }
}
