<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PlayerRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class GetPlayersController
{
    private $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    /**
     * @Route("/api/players")
     */
    public function __invoke(Request $request): JsonResponse
    {
        $playerIds         = \json_decode($request->getContent());
        $parameters        = $playerIds ? ['id' => $playerIds] : [];
        $players           = $this->playerRepository->findBy($parameters);
        $serializer        = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
        $serializedPlayers = $serializer->serialize($players, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => ['teams']]);

        return new JsonResponse($serializedPlayers, 200, [], true);
    }
}
