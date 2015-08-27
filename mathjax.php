<?php

use Herbie\DI;
use Herbie\Hook;

class MathjaxPlugin
{

    /** @var array */
    protected static $config;

    /**
     * Initialize plugin
     */
    public static function install()
    {
        $defaults = DI::get('Config')->get('plugins.config.mathjax', []);
        static::$config = array_merge([
            'cdn_url' => 'http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=AM_HTMLorMML.js',
            'built_in_js' => true,
        ], $defaults);

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
        $page = DI::get('Page');

        if (isset($page->mathjax)) {
            if ($page->mathjax == false) {
                return $content;
            }
        }

        static $addedJS;
        if (is_null($addedJS)) {
            if (!empty(static::$config['cdn_url'])) {
                DI::get('Assets')->addJs(static::$config['cdn_url']);
            }
            if (!empty(static::$config['built_in_js'])) {
                DI::get('Assets')->addJs("@plugin/mathjax/assets/mathjax.js");
            }
            $addedJS = true;
        }

        return '$' . $content . '$';
    }

}

MathjaxPlugin::install();
