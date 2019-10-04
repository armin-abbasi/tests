<?php

namespace Test;

require('./vendor/autoload.php');

use PHPUnit\Framework\TestCase;

/**
 * Override mt_rand() natural behaviour in order
 * to get idempotent output with each input values.
 * @param int $min
 * @param int|NULL $max
 * @return float
 */
function mt_rand(int $min = 2, int $max = NULL): float
{
    $min = intval($min);
    $max = intval($max);

    $max = $max < $min ? $min : $max;

    return round(($max - $min) / 2) + $min;
}

interface HeroInterface
{
    public function getAttack(): int;

    public function getDefence(): int;

    public function getHealthPoints(): int;

    public function setHealthPoints(int $healthPoints);
}

class DamageCalculator
{
    const DAMAGE_RAND_FACTOR = 0.2;

    public static function calculateDamage(HeroInterface $attacker, HeroInterface $defender): int
    {
        $damage = 0;

        $attackUnits = $attacker->getAttack();
        $defendUnits = $defender->getDefence();

        if ($attackUnits > $defendUnits) {
            $baseDamage = $attackUnits - $defendUnits;

            $factor = $baseDamage * self::DAMAGE_RAND_FACTOR;

            $minDamage = $baseDamage - $factor;
            $maxDamage = $baseDamage + $factor;

            $damage = mt_rand($minDamage, $maxDamage);
        }

        return $damage;
    }
}

class FightService
{
    public function fight(HeroInterface $attacker, HeroInterface $defender)
    {
        $damage = DamageCalculator::calculateDamage($attacker, $defender);

        $defender->setHealthPoints($defender->getHealthPoints() - $damage);
    }
}

class FightServiceTest extends TestCase
{
    const ATTACK = 15;
    const DEFENSE = 8;
    const HEALTH_POINTS = 100;

    private function getDamage(HeroInterface $attacker, HeroInterface $defender)
    {
        return DamageCalculator::calculateDamage($attacker, $defender);
    }

    public function testFight()
    {
        $fightService = new FightService();

        $attacker = $this->getMockBuilder(HeroInterface::class)->getMock();
        $defender = $this->getMockBuilder(HeroInterface::class)->getMock();

        $attacker->expects($this->any())
            ->method('getAttack')
            ->will($this->returnValue(self::ATTACK));

        $defender->expects($this->any())
            ->method('getDefence')
            ->will($this->returnValue(self::DEFENSE));

        $damage = $this->getDamage($attacker, $defender);

        $defender->expects($this->once())
            ->method('getHealthPoints')
            ->will($this->returnValue(self::HEALTH_POINTS));

        $defender->expects($this->once())
            ->method('setHealthPoints')
            ->with(self::HEALTH_POINTS - $damage);

        $fightService->fight($attacker, $defender);
    }
}