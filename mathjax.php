<?php

use Herbie\DI;
use Herbie\Hook;

class MathjaxPlugin
{

    /**
     * Initialize plugin
     */
    public static function install()
    {
        Hook::attach('shortcodeInitialized', ['MathjaxPlugin', 'shortcodeInitialized']);
    }

    /**
     * @param $shortcode
     */
    public static function shortcodeInitialized($shortcode)
    {
        $shortcode->add('math:ascii', ['MathjaxPlugin', 'asciiMathjax']);
    }

    /**
     * @param array $options
     * @return string
     */
    public static function asciiMathjax($options, $content)
    {
        static $js;
        if (is_null($js)) {
            DI::get('Assets')->addJs("http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=AM_HTMLorMML-full");
            DI::get('Assets')->addJs("@plugin/mathjax/assets/mathjax.js");
            $js = true;
        }
        return '$$$' . $content . '$$$';
    }

}

MathjaxPlugin::install();
