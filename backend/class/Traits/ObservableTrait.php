<?php declare(strict_types = 1);
namespace noxkiwi\observing\Traits;

use noxkiwi\observing\Observable\ObservableInterface;
use noxkiwi\observing\Observer;
use function array_diff;

/**
 * I am the trait that implements the basic Observable methods.
 *
 * @package      noxkiwi\observing
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
trait ObservableTrait
{
    /** @var \noxkiwi\observing\Observer[] Contains the observers for this instance. */
    private array $observers = [];

    /**
     * Add another Observer to this Observable class instance
     *
     * @param \noxkiwi\observing\Observer $observer
     */
    final public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    /**
     * Remove an Observer from this Observable class instance
     *
     * @param \noxkiwi\observing\Observer $observer
     */
    final public function detach(Observer $observer): void
    {
        $this->observers = array_diff($this->observers, [$observer]);
    }

    /**
     * Poll for changes in the current class instance
     *
     * @param string|null $type
     */
    final public function notify(string $type = null): void
    {
        $type ??= '';
        if (! $this instanceof ObservableInterface) {
            return;
        }
        foreach ($this->observers as $observer) {
            // If the trait is used, interface is implemented.
            /** @noinspection PhpParamsInspection */
            $observer->update($this, $type);
        }
    }
}
