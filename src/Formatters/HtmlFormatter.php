<?php
/**
 * Scabbia2 Formatters Component
 * https://github.com/eserozvataf/scabbia2
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link        https://github.com/eserozvataf/scabbia2-formatters for the canonical source repository
 * @copyright   2010-2016 Eser Ozvataf. (http://eser.ozvataf.com/)
 * @license     http://www.apache.org/licenses/LICENSE-2.0 - Apache License, Version 2.0
 */

namespace Scabbia\Formatters;

use Scabbia\Formatters\FormatterInterface;

/**
 * Implementation for generation of output in Html format
 *
 * @package     Scabbia\Formatters
 * @author      Eser Ozvataf <eser@ozvataf.com>
 * @since       2.0.0
 */
class HtmlFormatter implements FormatterInterface
{
    /**
     * Writes given message in header format
     *
     * @param int    $uHeading size
     * @param string $uMessage message
     *
     * @return void
     */
    public function writeHeader($uHeading, $uMessage)
    {
        echo "<h{$uHeading}>{$uMessage}</h{$uHeading}>";
    }

    /**
     * Writes given message in specified color
     *
     * @param string $uColor   color
     * @param string $uMessage message
     *
     * @return void
     */
    public function writeColor($uColor, $uMessage)
    {
        echo "<div style=\"color: {$uColor};\">{$uMessage}</div>";
    }

    /**
     * Writes given message
     *
     * @param string $uMessage message
     *
     * @return void
     */
    public function write($uMessage)
    {
        echo "<div>{$uMessage}</div>";
    }

    /**
     * Outputs the array in HTML representation
     *
     * @param array $uArray Target array will be printed
     *
     * @return void
     */
    public function writeArray(array $uArray)
    {
        /** @type string $tEntryKey */
        /** @type array $tEntry */
        foreach ($uArray as $tEntryKey => $tEntry) {
            echo "<p>";
            echo "<strong>{$tEntryKey}:</strong><br />";
            echo "<ul>";

            $tPassed = true;
            /** @type array $tTest */
            foreach ($tEntry as $tTest) {
                if ($tTest["failed"]) {
                    $tPassed = false;
                    $tColor = "red";
                } else {
                    $tColor = "green";
                }

                echo "<li>";
                echo "<span style=\"color: {$tColor};\">{$tTest["operation"]}</span>";
                if ($tTest["message"] !== null) {
                    echo ": {$tTest["message"]}";
                }
                echo "</li>";
            }

            echo "</ul>";

            if (!$tPassed) {
                echo "<span style=\"color: red;\">FAILED</span>";
            } else {
                echo "<span style=\"color: green;\">PASSED</span>";
            }

            echo "</p>";
        }
    }
}
