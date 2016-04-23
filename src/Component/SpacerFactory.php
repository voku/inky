<?php
/**
 *  Spacer.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   Row.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       23.04.16
 */ 


namespace Hampe\Inky\Component;


use Hampe\Inky\Inky;
use PHPHtmlParser\Dom\HtmlNode;
use PHPHtmlParser\Dom\TextNode;

class SpacerFactory extends AbstractComponentFactory
{

    const NAME = 'spacer';

    public function getName()
    {
        return self::NAME;
    }

    /**
     * <spacer size="{size}" />
     * ---------------------------
     * <table class="spacer">
     *    <tbody>
     *      <tr>
     *          <td height="{size}px" style="font-size:{size}px;line-height:{size}px;">&#xA0;</td>
     *      </tr>
     *    </tbody>
     * </table>
     *
     * @param HtmlNode $element
     * @param Inky $inkyInstance
     *
     * @return HtmlNode
     */
    public function parse(HtmlNode $element, Inky $inkyInstance)
    {
        $size = 16;
        $attributes = $element->getAttributes();
        if($element->getAttribute('size')) {
            $size = (int) $element->getAttribute('size');
            unset($attributes['size']);
        }
        $table = $this->table($attributes);
        $this->addCssClass('spacer', $table);
        $body = $this->tbody();
        $tr = $this->tr();
        $td = $this->td();

        $td->setAttribute('height', sprintf('%dpx', $size));
        $td->setAttribute('style', sprintf('font-size:%dpx;line-height:%dpx;', $size, $size));
        $td->addChild(new TextNode('&#xA0;'));

        $tr->addChild($td);
        $body->addChild($tr);
        $table->addChild($body);

        return $table;
    }


}