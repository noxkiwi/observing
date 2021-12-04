<?php declare(strict_types = 1);
namespace noxkiwi\observing\Example;

use noxkiwi\observing\Exception\VelocityException;
use noxkiwi\observing\Observable\ObservableInterface;
use noxkiwi\observing\Observer;
use const E_ERROR;

/**
 * I am the base Observable class.
 *
 * @package      noxkiwi\observing
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
final class CarObserver extends Observer
{
    public const VELOCITY = 'velocity';
    /** @var float I am the maximum velocity that is allowed on the road in Km/h. */
    public static float $maxVelocity = 50;

    /**
     * @throws \noxkiwi\core\Exception
     * @inheritDoc
     */
    public function update(ObservableInterface $observable, string $type): void
    {
        if (! $observable instanceof Car) {
            return;
        }
        switch ($type) {
            case self::VELOCITY:
                if ($observable->getVelocity() > self::$maxVelocity) {
                    throw new VelocityException("I can't accellerate more! If I was, you'd be driving too fast!", E_ERROR);
                }
                break;
            default:
        }
    }
}
