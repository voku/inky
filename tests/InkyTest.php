<?php
/**
 *  Test.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   Test.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       13.03.16
 */ 


class InkyTest extends PHPUnit_Framework_TestCase {

    public function testGridColumns()
    {
        $inky = new \Hampe\Inky\Inky(10);
        $this->assertEquals(10, $inky->getGridColumns(), 'Inky Grid Coulmns');

        $inky->setGridColumns(23);
        $this->assertEquals(23, $inky->getGridColumns(), 'Inky Grid Columns');
    }

    public function testAlias()
    {
        $inky = new \Hampe\Inky\Inky();

        $inky->addAlias('test', 'callout');
        $this->assertContains('test', $inky->getAllAliasForTagName('callout'), 'Inky Alias for Tag');
        $this->assertEquals($inky->getComponentFactory('callout'), $inky->getComponentFactory('test'));
        $this->assertEquals('<table><tr><th class="callout">Test</th></tr></table>', $inky->releaseTheKraken('<test>Test</test>'));


        $inky->removeAlias('test');
        $this->assertNotContains('test', $inky->getAllAliasForTagName('callout'));
        $this->assertEquals(null, $inky->getComponentFactory('test'));
        $this->assertEquals('<test>Test</test>', $inky->releaseTheKraken('<test>Test</test>'));

    }

}
