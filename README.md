JaitecPassBundle
=================

This bundle provides helpers to generate and check passwords.


Installation
============

Add PassBundle to your vendor/bundles/ dir
------------------------------------------

::

    $ git submodule add git://github.com/jlaso/JaitecPassBundle.git vendor/bundles/Jaitec/PassBundle

or add this to deps

    [JaitecPassBundle]    
        git=http://github.com/jlaso/JaitecPassBundle
        target=/bundles/Jaitec/PassBundle

and run 

    $ php bin/vendors install

Add the Jaitec namespace to your autoloader
-------------------------------------------

::

    // app/autoload.php
    $loader->registerNamespaces(array(
        'Jaitec' => __DIR__.'/../vendor/bundles',
        // your other namespaces
    );

Add AliasBundle to your application kernel
------------------------------------------

::

    // app/AppKernel.php

    public function registerBundles()
    {
        return array(
            // ...
            new Jaitec\PassBundle\JaitecPassBundle(),
            // ...
        );
    }



Usage
=====

PassBundle provides this service to generate and check passwords :

- ``jaitec_pass.main`` implements ``PassGeneratorInterface``


Instead of those specialized services, you can also inject ``jaitec_pass.main``,
which provides shortcuts to all of the other services and allow you to only
inject a single dependency.

Sample
======

For example generating password

First get the object throught dependency injection

    $passgen = $this->container->get('jaitec_pass.main');

Now generate the password

    $alias = $passgen->generate(7);


        

        