<?php
/**
 *  MenuFactoryTest.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   MenuFactoryTest.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       28.02.16
 */

namespace Component;

class MenuItemFactoryTest extends AbstractComponentFactoryTest {

    protected $testCases = array(
        'Case 1' => array(
            'from' => '<item class="test" href="http://example.com/123">Html</item>',
            'to' => '<th class="test"><a href="http://example.com/123">Html</a></th>'
        ),
        'Case 2' => array(
            'from' => '<menu><item class="test" href="http://example.com/123">Html</item></menu>',
            'to' => '<table class="menu"><tr><th class="test"><a href="http://example.com/123">Html</a></th></tr></table>'
        ),
        'Case 3' => array(
            'from' => '<menu><item class="test" href="http://example.com/123">Html</item><item class="test" href="http://example.com/123">Html</item><item class="test" href="http://example.com/123">Html</item></menu>',
            'to' => '<table class="menu"><tr><th class="test"><a href="http://example.com/123">Html</a></th><th class="test"><a href="http://example.com/123">Html</a></th><th class="test"><a href="http://example.com/123">Html</a></th></tr></table>'
        ),
        'Case 4' => array(
            'from' => '<item class="test">Html</item>',
            'to' => '<th class="test"><a>Html</a></th>'
        ),
    );

}
