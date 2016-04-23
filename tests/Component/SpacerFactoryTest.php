<?php
/**
 *  CenterFactoryTest.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   CenterFactoryTest.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       13.03.16
 */ 


namespace Component;


class SpacerFactoryTest extends AbstractComponentFactoryTest
{
    protected $testCases = array(
        'Creates a spacer element with correct size' => array(
            'from' =>   '<spacer size="10"></spacer>',
            'to' =>     '
                        <table class="spacer">
                            <tbody>
                              <tr>
                                <td height="10px" style="font-size:10px;line-height:10px;">&#xA0;</td>
                              </tr>
                            </tbody>
                        </table>
                        '
        ),
        'copies classes to the final spacer HTML' => array(
            'from' =>   '<spacer size="10" class="bgcolor"></spacer>',
            'to' =>     '
                          <table class="spacer bgcolor">
                            <tbody>
                              <tr>
                                <td height="10px" style="font-size:10px;line-height:10px;">&#xA0;</td>
                              </tr>
                            </tbody>
                          </table>
                        '
        )
    );
}
