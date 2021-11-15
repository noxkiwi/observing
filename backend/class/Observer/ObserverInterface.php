<?php declare(strict_types = 1);
namespace noxkiwi\observing\Observer;

use noxkiwi\observing\Observable\ObservableInterface;

/**
 * I am the interface for all Observers.
 *
 * @package      noxkiwi\observing
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
interface ObserverInterface
{
    /**
     * I will always be executed when the given $Observable object is manipulated
     *
     * @param ObservableInterface $observable
     * @param string              $type
     */
    public function update(ObservableInterface $observable, string $type): void;
}
