<?php

/**
 * (c) Joseluis Laso <wld1373@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 * 
 * The functionallity of this class is to have a method that obtain 
 * a random password
 * 
 */

namespace Jaitec\PassBundle\Generator;


class MainGenerator implements PassGeneratorInterface
{
    private $base = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ09123456789{}%&$#@*+-?';
    
    function __construct($kernel) {
        // first gets the base from config, if any
        $base = $kernel->getContainer()->getParameter('jaitec_pass');
        if ($base)
            $this->base = $base;
    }
    
    /**
     * generates a random password with the digits indicated
     * @param byte $digits
     * @return string 
     */
    public function generate($digits = 8){
        if($digits > strlen($this->base))
            throw new \Exception("Number of digits($digits) excedes the length of base in JaitecPassBundle->generate");
        $ret = '';
        $base = $this->base;
        for ($i=0;$i<$digits;$i++){
            $c = rand(0,count($base));
            $ret .= substr($base,$c,1);
            $base = (($c>0)?substr($base,0,$c-1):"").substr($base,$c+1);
        }
        return $ret;
    }
    
    
}
