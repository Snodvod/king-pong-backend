<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Player;
use Doctrine\ORM\EntityRepository;

class MatchRepository extends EntityRepository
{
    public function findByPlayer(Player $player): array
    {
        return $this->createQueryBuilder('match')
            ->select('match')
            ->join('match.teams', 'team')
            ->join('team.players', 'player')
            ->where('player = :player')
            ->setParameter('player', $player)
            ->getQuery()
            ->getResult();
    }
}
