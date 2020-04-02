<?php

declare(strict_types=1);

namespace App\Controller\Match;

use App\Entity\Player;
use App\Repository\MatchRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
        dump($this->matchRepository->findByPlayer($player));
        die;
    }
}
