<?php
/**
 *  CalloutFactory.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   CalloutFactory.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       13.03.16
 */


namespace Hampe\Inky\Component;

use Hampe\Inky\Inky;
use PHPHtmlParser\Dom\HtmlNode;

class CalloutFactory extends AbstractComponentFactory
{

    const NAME = 'callout';

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * <callout>{inner}</callout>
     * ----------------------------------
     * <table>
     *      <tr>
     *          <th class="callout {class}">{inner}</th>
     *      </tr>
     * </table>
     *
     * @param HtmlNode $element
     * @param Inky $inkyInstance
     *
     * @return HtmlNode
     */
    public function parse(HtmlNode $element, Inky $inkyInstance)
    {
        $table = $this->table();
        $tr = $this->tr();

        $th = $this->th($element->getAttributes());
        $this->addCssClass('callout', $th);
        $this->copyChildren($element, $th);

        $tr->addChild($th);
        $table->addChild($tr);
        return $table;
    }


}