TaveoPolishExtensionsBundle
===========================

Symfony2 Bundle for Polish validators: NIP, REGON, PESEL

It has validation translations for pl, en, de.

Installation
============

Bring in the vendor libraries
-----------------------------

This can be done in two different ways:

**Method #1**) Use composer

    "require": {
        "php": ">=5.3.2",
        "symfony/symfony": "2.1.*",
        "_others": "your other packages",

        "taveo/polish-extensions-bundle": "dev-master",
    }


**Method #2**) Use git submodules

    git submodule add git://github.com/taveo/TaveoPolishExtensionsBundle.git vendor/bundles/Taveo/PolishExtensionsBundle

Register the Taveo namespace
---------------------------------------------------

Only required, when using submodules.

    // app/autoload.php
    $loader->registerNamespaces(array(
        'Taveo'  => __DIR__.'/../vendor/bundles',
        // your other namespaces
    ));

Add PolishExtensionsBundle to your application kernel
-------------------------------------------------------

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Taveo\PolishExtensionsBundle\TaveoPolishExtensionsBundle(),
            // ...
        );
    }

Examples
========
**#1**) Annotations

```php
<?php
    // src/Acme/DemoBundle/Entity/AcmeEntity.php
    
    use Taveo\PolishExtensionsBundle\Validator\Constraints as TaveoAssert;
    
    class AcmeEntity
    {
        // ...
    
        /**
         * @TaveoAssert\NIP
         */
        protected $nip;

        /**
         * @TaveoAssert\PESEL
         */
        protected $pesel;
    
        /**
         * @TaveoAssert\REGON
         */
        protected $regon;
    
        // ...
    
    }
    
    
```

**#2**) YAML
``` yaml
# src/Acme/DemoBundle/Resources/config/validation.yml
Acme\DemoBundle\Entity\AcmeEntity:
    properties:
        nip:
            - Taveo\PolishExtensionsBundle\Validator\Constraints\NIP: ~
        pesel:
            - Taveo\PolishExtensionsBundle\Validator\Constraints\PESEL: ~
        regon:
            - Taveo\PolishExtensionsBundle\Validator\Constraints\REGON: ~
```
