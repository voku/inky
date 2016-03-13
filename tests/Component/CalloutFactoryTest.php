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


namespace Component;


class Test extends AbstractComponentFactoryTest {
    protected $testCases = array(
        'creates a callout with correct syntax' => array(
            'from'  =>  '<callout></callout>',
            'to'    =>  '
                        <table>
                            <tr>
                              <th class="callout"></th>
                            </tr>
                        </table>
                        '
        ),
        'copies classes to the final HTML' => array(
            'from'  =>  '<callout class="primary"></callout>',
            'to'    =>  '
                        <table>
                            <tr>
                              <th class="callout primary"></th>
                            </tr>
                        </table>
                        '
        ),
        'Case 1' => array(
            'from' => '<callout class="test">Html</callout>',
            'to' => '<table><tr><th class="callout test">Html</th></tr></table>'
        )
    );
}
