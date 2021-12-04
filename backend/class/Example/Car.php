<?php declare(strict_types = 1);
namespace noxkiwi\observing\Example;

use noxkiwi\core\Exception\InvalidArgumentException;
use noxkiwi\observing\Traits\ObservableTrait;
use const E_ERROR;

/**
 * I am a Car. It's as simple as that.
 *
 * I have a velocity property.
 * Whenever it changes, I will call the CarObserver.
 *
 * The CarObserver knows the speed limit so it can now check the current speed against the limit.
 * The CarObserver then will take actions if the boundaries are violated.
 *
 * @package      noxkiwi\observing
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
final class Car
{
    use ObservableTrait;

    /** @var float I am the current velocity of the car. The car doesn't know the speed limit. */
    private float $velocity;

    /**
     * I will accelerate the velocity by the given $velocity.
     *
     * @param float $velocity
     *
     * @throws \noxkiwi\core\Exception\InvalidArgumentException You must pass a positive value to accelerate!
     */
    public function accelerate(float $velocity): void
    {
        if ($velocity < 0) {
            throw new InvalidArgumentException('Accelerating must be positive velocity.', E_ERROR);
        }
        $this->setVelocity($this->getVelocity() + $velocity);
    }

    /**
     * I will set the velocity of the vehicle.
     *
     * @param float $velocity
     */
    private function setVelocity(float $velocity): void
    {
        $this->velocity = $velocity;
        $this->notify(CarObserver::VELOCITY);
    }

    /**
     * I will return the current velocity of the vehicle.
     * @return float
     */
    public function getVelocity(): float
    {
        return $this->velocity;
    }

    /**
     * I will decelerate the velocity by the given $velocity.
     *
     * @param float $velocity
     *
     * @throws \noxkiwi\core\Exception\InvalidArgumentException You must pass a negative value to decelerate!
     */
    public function decelerate(float $velocity): void
    {
        if ($velocity > 0) {
            throw new InvalidArgumentException('Accelerating must be negative velocity.', E_ERROR);
        }
        $this->setVelocity($this->getVelocity() + $velocity);
    }
}
