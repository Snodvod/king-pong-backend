<?php

declare(strict_types=1);

namespace App\Controller\Match;

use App\Entity\Player;
use App\Repository\MatchRepository;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetMatchesController extends AbstractController
{
    private $matchRepository;
    private $serializer;

    public function __construct(MatchRepository $matchRepository, SerializerInterface $serializer)
    {
        $this->matchRepository = $matchRepository;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/api/player/{player}/matches", methods={"GET"})
     */
    public function __invoke(Player $player)
    {
        $matches = $this->matchRepository->findByPlayer($player);

        $serializedMatches = $this->serializer->serialize($matches, 'json');

        return new JsonResponse($serializedMatches, 200, [], true);

    }
}
