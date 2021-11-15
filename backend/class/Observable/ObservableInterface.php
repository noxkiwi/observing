<?php declare(strict_types = 1);
namespace noxkiwi\observing\Observable;

use noxkiwi\observing\Observer;

/**
 * I am the interface for all Observable classes.
 *
 * @package      noxkiwi\observing
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
interface ObservableInterface
{
    /**
     * Add another Observer to this Observable class instance
     *
     * @param \noxkiwi\observing\Observer $observer
     */
    public function attach(Observer $observer): void;

    /**
     * Remove an Observer from this Observable class instance
     *
     * @param \noxkiwi\observing\Observer $observer
     */
    public function detach(Observer $observer): void;

    /**
     * I will notify the observers of the observable object about a change of the given $type.
     * The Observers can then access the methods and properties of the Observable object.
     *
     * @param string|null $type
     */
    public function notify(string $type = null): void;
}
