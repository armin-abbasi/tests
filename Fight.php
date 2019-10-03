
<?php

require('./vendor/autoload.php');

use PHPUnit\Framework\TestCase;

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

        if ($attacker->getAttack() > $defender->getDefence()) {
            $baseDamage = $attacker->getAttack() - $defender->getDefence();

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

class FightServiceTest extends TestCase {

    public function testFight()
    {
        $this->assertTrue(true,true);
    }
}