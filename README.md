## Converter
[![Build Status](https://travis-ci.org/geissler/converter.png?branch=master)](https://travis-ci.org/geissler/converter)

A small library to convert the input data for different literature standards like BibTeX, CSL etc. into each other.
At the moment are supported [BibTeX](http://en.wikipedia.org/wiki/BibTeX "BibTeX"),
[CSL](http://citationstyles.org/ "CSL") and [RIS](http://en.wikipedia.org/wiki/RIS_\(file_format\) "RIS").

## Installation
### Via [composer](http://getcomposer.org/ "composer")
Add to the `composer.json` the `require` key and run composer install.
```
    "require" : {
        "geissler/converter": "dev-master"
    }
```
### Other
Make sure you are using a
[PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md "PSR-2")
compatible autoloader.

## Usage
To convert form one standard to an other:
```php
    // include the composer autoloader
    require __DIR__ . '/vendor/autoload.php';

    use Geissler\Converter\Converter;
    use Geissler\Converter\Standard\RIS\RIS;
    use Geissler\Converter\Standard\BibTeX\BibTeX;
    use Geissler\Converter\Standard\CSL\CSL;

    $converter  =   new Converter();

    // your input RIS data
    $data = 'TY  - JOUR
             TI  - Die Grundlage der allgemeinen Relativitätstheorie
             AU  - Einstein, Albert
             PY  - 1916
             SP  - 769
             EP  - 822
             JO  - Annalen der Physik
             VL  - 49
             ER  - ';

    // convert to bibTeX
    $bibTeX =   $converter->convert(new RIS($data), new BibTeX());

    /**
     * $bibTeX has know the following value:
     *
     * @article{article,
     *      author = {Einstein, Albert},
     *      year = {1916},
     *      pages = {769-822},
     *      title = {Die Grundlage der allgemeinen Relativitätstheorie},
     *      volume = {49}
     * }
     */

     // or convert bibTeX to csl
     $csl   =   $converter->convert(new BibTeX($bibTeX), new CSL());

     /**
      * $csl has know the following value (a UTF-8 encoded json string):
      *
      * [
      *     {
      *         "type":"article",
      *         "author":[{
      *             "family":"Einstein",
      *             "given":"Albert"
      *         }],
      *         "issued":[{
      *             "year":"1916"
      *         }],
      *         "page":"769-822",
      *         "page-first":"769",
      *         "citation-label":"article",
      *         "title":"Die Grundlage der allgemeinen Relativit\u00e4tstheorie"
      *     }
      * ]
      */

```

## Adding a standard
To implement a new standard is quite simple:

1. Create a copy of the folder **src/Geissler/Converter/Standard/Template**
2. Change the name to the new standard.
3. Rename also the **Template.php** file to the name of the standard
4. Replace every occurence of **Template** in the files **Creator.php**, **Parser.php** and **Template.php** with the
 name of the new standard.
5. Implement the methods **create** and **retrieve** in **Creator.php**
6. Implement the methods **parse** and **retrieve** in **Parser.php**
7. Don't forget to write your PHPUnit tests and follow the
[PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md "PSR-2") coding
standard
