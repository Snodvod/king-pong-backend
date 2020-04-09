<?php

declare(strict_types=1);

namespace App\Controller\Match;

use App\Entity\Player;
use App\Repository\MatchRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class GetMatchesController extends AbstractController
{
    private $matchRepository;

    public function __construct(MatchRepository $matchRepository)
    {
        $this->matchRepository = $matchRepository;
    }

    /**
     * @Route("/api/player/{player}/matches", methods={"GET"})
     */
    public function __invoke(Player $player)
    {
        $matches = $this->matchRepository->findByPlayer($player);

        $serializer        = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
        $serializedMatches = $serializer->serialize($matches, 'json');


        return new JsonResponse($serializedMatches, 200, [], true);

    }
}
