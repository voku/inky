<?php
/**
 *  MenuFactory.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   MenuFactory.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       27.02.16
 */ 


namespace Hampe\Inky\Component;


use Hampe\Inky\Inky;
use PHPHtmlParser\Dom\HtmlNode;

class MenuFactory extends AbstractComponentFactory
{

    const NAME = 'menu';

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * <menu>{inner}</menu>
     * ----------------------------
     * <table class="menu {class}">
     *  <tr>{inner}</tr>
     * </table>
     *
     * @param HtmlNode $element
     * @param Inky $inkyInstance
     *
     * @return HtmlNode
     */
    public function parse(HtmlNode $element, Inky $inkyInstance)
    {
        $table = $this->table($element->getAttributes());
        $this->addCssClass('menu', $table);
        $tr = $this->tr();

        if($this->elementHasCssClass($element, 'vertical')) {
            $th = $this->th();
            foreach($element->getChildren() as $childElement) {
                if($childElement instanceof HtmlNode) {
                    $childTable = $this->table(array('class' => 'menu-item'));
                    $childTr = $this->tr();

                    $childTr->addChild($childElement);
                    $childTable->addChild($childTr);
                    $th->addChild($childTable);
                }else {
                    $th->addChild($childElement);
                }
            }
            $tr->addChild($th);
        }else {
            $this->copyChildren($element, $tr);
        }
        $table->addChild($tr);

        return $table;
    }


}