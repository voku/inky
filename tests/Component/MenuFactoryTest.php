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

class MenuFactoryTest extends AbstractComponentFactoryTest {

    protected $testCases = array(
        'creates a menu with item tags inside' => array(
            'from'  =>  '
                        <menu>
                            <item href="http://zurb.com">Item</item>
                        </menu>
                        ',
            'to'    =>  '
                        <table class="menu">
                            <tr>
                              <th><a href="http://zurb.com">Item</a></th>
                            </tr>
                        </table>
                        '
        ),
        'creates a menu with classes' => array(
            'from'  =>  '<menu class="awesome"></menu>',
            'to'    =>  '
                        <table class="menu awesome">
                            <tr>
                            </tr>
                        </table>
                        '
        ),
        'treats vertical menus differently' => array(
            'from'  =>  '
                        <menu class="vertical">
                            <item href="#abc">ABC</item>
                        </menu>
                        ',
            'to'    =>  '
                        <table class="menu vertical">
                            <tr>
                              <th>
                                <table class="menu-item">
                                  <tr>
                                    <th><a href="#abc">ABC</a></th>
                                  </tr>
                                </table>
                              </th>
                            </tr>
                        </table>
                        '
        ),
        'works without using an item tag' => array(
            'from'  =>  '
                        <menu>
                            <td><a href="http://zurb.com">Item 1</a></td>
                            <td><a href="http://zurb.com">Item 2</a></td>
                        </menu>
                        ',
            'to'    =>  '
                        <table class="menu">
                            <tr>
                              <td><a href="http://zurb.com">Item 1</a></td>
                              <td><a href="http://zurb.com">Item 2</a></td>
                            </tr>
                        </table>
                        '
        ),

        'Case 1' => array(
            'from' => '<menu class="test">Html</menu>',
            'to' => '<table class="menu test"><tr>Html</tr></table>'
        ),
        'Case 3' => array(
            'from'  =>  '
                        <menu class="vertical">
                            <item href="#abc">ABC</item>
                            Test
                        </menu>
                        ',
            'to'    =>  '
                        <table class="menu vertical">
                            <tr>
                              <th>
                                <table class="menu-item">
                                  <tr>
                                    <th><a href="#abc">ABC</a></th>
                                  </tr>
                                </table>
                                Test
                              </th>
                            </tr>
                        </table>
                        '
        ),
    );

}
