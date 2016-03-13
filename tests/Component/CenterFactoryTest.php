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


class CenterFactoryTest extends AbstractComponentFactoryTest
{
    protected $testCases = array(
        'Applies a text-center class and center alignment attribute to the first child' => array(
            'from' =>   '
                        <center>
                            <div>Html</div>
                        </center>
                        ',
            'to' =>     '
                        <center>
                            <div align="center" class="text-center">Html</div>
                        </center>
                        '
        ),
        'Does not choke if center tags are nested' => array(
            'from' =>   '
                        <center>
                            <center></center>
                        </center>
                        ',
            'to' =>     '
                        <center>
                            <center align="center" class="text-center"></center>
                        </center>
                        '
        )
    );
}
