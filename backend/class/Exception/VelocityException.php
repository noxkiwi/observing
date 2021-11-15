<?php declare(strict_types = 1);
namespace noxkiwi\observing\Exception;

use Exception;
use noxkiwi\observing\Traits\ObservableTrait;
use const E_ERROR;

/**
 * I am raised when the driver wants to go too fast.
 *
 * @package      noxkiwi\observing\Exception
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2021 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
final class VelocityException extends \noxkiwi\core\Exception
{}
