<?php
/**
 * Scabbia2 Formatters Component
 * http://www.scabbiafw.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link        https://github.com/scabbiafw/scabbia2-formatters for the canonical source repository
 * @copyright   2010-2015 Scabbia Framework Organization. (http://www.scabbiafw.com/)
 * @license     http://www.apache.org/licenses/LICENSE-2.0 - Apache License, Version 2.0
 */

namespace Scabbia\Formatters;

use Scabbia\Formatters\FormatterInterface;
use Scabbia\Formatters\ConsoleFormatter;
use Scabbia\Formatters\HtmlFormatter;

/**
 * Formatters registry
 *
 * @package     Scabbia\Formatters
 * @author      Eser Ozvataf <eser@ozvataf.com>
 * @since       2.0.0
 */
class Formatters
{
    /** @type FormatterInterface         $default        default formatter */
    public static $default = null;


    /**
     * Returns the instance of default formatter
     *
     * @return FormatterInterface default formatter
     */
    public static function getCurrent()
    {
        if (static::$default === null) {
            if (PHP_SAPI === "cli") {
                static::$default = new ConsoleFormatter();
            } else {
                static::$default = new HtmlFormatter();
            }
        }

        return static::$default;
    }
}
