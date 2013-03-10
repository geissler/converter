## Converter
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
    use Geissler\Converter\Standard\BibTeX\BibTeX;
    use Geissler\Converter\Standard\CSL\CSL;

    // your input BibTeX data
    $data = '';

    $converter = new Converter();
    $csl = $converter->convert(new BibTeX($data), new CSL());
```

## Adding a standard