JaitecPassBundle
=================

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/5a921732-9918-4fda-932c-c755a6e968c1/big.png)](https://insight.sensiolabs.com/projects/5a921732-9918-4fda-932c-c755a6e968c1)

-This bundle provides helpers to generate passwords.

-Now you can generate long secret id with a pattern, this can help you to implement web services

-Soon I want to implement a method to check the complexity
of a password


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

PassBundle provides these services to generate passwords and secrets :

- ``jaitec_pass.main`` implements ``PassGeneratorInterface``
- ``jaitec_pass.secret`` implements ``PassGeneratorInterface``


Instead of those specialized services, you can also inject ``jaitec_pass.main`` or
``jaitec_pass.secret``, which provides shortcuts to all of the other services and 
allow you to only inject a single dependency.

Sample
======

For example generating password

First get the object throught dependency injection

    $passgen = $this->container->get('jaitec_pass.main');

Now generate the password

    $alias = $passgen->generate(7);

Now for generate a secret id
        
    $secretgen = $this->container->get('jaitec_pass.secret');

Now generate the secret

    $secret = $secretgen->generate(20);

