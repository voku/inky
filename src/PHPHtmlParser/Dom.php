<?php
/**
 *  Dom.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   Dom.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <thomas@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       30.08.16
 */ 


namespace Hampe\Inky\PHPHtmlParser;


class Dom extends \PHPHtmlParser\Dom
{

    /**
     * Cleans the html of any none-html information.
     *
     * @param string $str
     * @return string
     */
    protected function clean($str)
    {
        // clean out the \n\r
        $str = str_replace(["\r\n", "\r", "\n"], ' ', $str);

        // strip the doctype
        $str = mb_eregi_replace("<!doctype(.*?)>", '', $str);

        // strip out cdata
        $str = mb_eregi_replace("<!\[CDATA\[(.*?)\]\]>", '', $str);

        return $str;
    }


}