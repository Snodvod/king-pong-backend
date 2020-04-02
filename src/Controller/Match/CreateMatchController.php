<?php

declare(strict_types=1);

namespace App\Controller\Match;

use App\Entity\Match;
use App\Entity\Team;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateMatchController
{
    private $playerRepository;
    private $entityManager;
    private $logger;

    public function __construct(PlayerRepository $playerRepository, EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->playerRepository = $playerRepository;
        $this->entityManager    = $entityManager;
        $this->logger = $logger;
    }

    /**
     * @Route("/api/match/create", methods={"POST"})
     */
    public function __invoke(Request $request)
    {
        $matchContents = \json_decode($request->getContent(), true);

        foreach ($matchContents as $matchContent) {
            $match = new Match();
            foreach ($matchContent as $teamContent) {
                $playerIds = $teamContent['players'];
                $hasWon    = $teamContent['hasWon'];
                $players   = $this->playerRepository->findBy(['id' => $playerIds]);

                $team = new Team($players, $hasWon, $match);
                $this->entityManager->persist($team);
            }
            $this->entityManager->persist($match);
        }

        $this->entityManager->flush();

        return new JsonResponse();
    }
}
