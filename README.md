# Herbie MathJax Plugin

`MathJax` ist ein [Herbie](http://github.com/getherbie/herbie) Plugin, mit dem du die gleichnamige JavaScript Display 
Engine [MathJax](https://www.mathjax.org) in deine Website einbettest und damit schöne mathematische Formeln schreiben 
kannst.


## Installation

Das Plugin installierst du via Composer.

	$ composer require getherbie/plugin-mathjax

Danach aktivierst du das Plugin in der Konfigurationsdatei.

    plugins:
        enable:
            - mathjax


## Konfiguration

Unter `plugins.config.mathjax` stehen dir die folgenden Optionen zur Verfügung:

    # MathJax Content Delivery Network (CDN). If false, no url is used.
    cdn_url: http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=AM_HTMLorMML.js

    # Use built-in JS of the plugin
    built_in_js: true


## Seiteneigenschaft

Du kannst für einzelne Seiten das Parsen von AscriiMath komplett deaktivieren. Dazu musst du in den Seiteneigenschaften
den folgenden Wert setzen.

    ---
    title: Seite ohne MathJax
    mathjax: false
    ---


## Anwendung

Deine mathematischen Formeln schreibst du mit Hilfe von AsciiMath. AsciiMath ist eine einfach zu schreibende 
Markup-Sprache für mathematische Formeln. Mehr Informationen zu AsciiMath und der Syntax findest du 
unter <http://asciimath.org>.

Nach der Installation des Plugins steht dir der folgende Shortcode zur Verfügung:

[math:ascii] a^2 + b^2 = c^2 [/math:ascii]

