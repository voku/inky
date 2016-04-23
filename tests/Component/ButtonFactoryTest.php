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

class ButtonFactoryTest extends AbstractComponentFactoryTest
{

    protected $testCases = array(
        'creates a simple button' => array(
            'from'  =>  '<button href="http://zurb.com">Button</button>',
            'to'    =>  '
                        <table class="button">
                            <tr>
                              <td>
                                <table>
                                  <tr>
                                    <td><a href="http://zurb.com">Button</a></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                        </table>
                        '
        ),
        'creates a button with classes' => array(
            'from'  => '<button class="small alert" href="http://zurb.com">Button</button>',
            'to'    => '
                        <table class="button small alert">
                            <tr>
                              <td>
                                <table>
                                  <tr>
                                    <td><a href="http://zurb.com">Button</a></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                        </table>
            ',
        ),
        'creates a correct expanded button' => array(
            'from'  => '<button class="expand" href="http://zurb.com">Button</button>',
            'to'    => '
                              <table class="button expand">
                                <tr>
                                  <td>
                                    <table>
                                      <tr>
                                        <td>
                                          <center><a href="http://zurb.com" align="center" class="float-center">Button</a></center>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                  <td class="expander"></td>
                                </tr>
                              </table>
            ',
        )
    );

}
