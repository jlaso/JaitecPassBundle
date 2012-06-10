<?php

/**
 * (c) Joseluis Laso <wld1373@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 * 
 * The functionallity of this class is to have a method that obtain 
 * a random secret id, like a password but with more length, in
 * this base array sample the secret is alternatively digit,letter,etc..
 * but you can configure freely, another sample is in config.yml 
 * 
 */

namespace Jaitec\PassBundle\Generator;


class SecretGenerator implements PassGeneratorInterface
{
    private $base = array(
                    '0123456789',
                    'abcdefghiK',
                    '1234567890',
                    'jklmnopqrY',
                    '2345678901',
                    'stuvwxyzXa',
                   );
    
    // this holds base-n of this class, calculated at run-time
    private $n = 0;
    
    // this holds number of cycling bases for each n-digit
    private $l = 0; 
    
    
    function __construct($kernel) {
        // first gets the base from config, if any
        $base = $kernel->getContainer()->getParameter('jaitec_pass_secret');
        if ($base)
            $this->base = $base;
        
        $this->l = count($this->base);
        // check now if array base is correctly formed, i.e. same lenght for
        // all elements and  non-repeated chars
        for($i=0;$i<$this->l;$i++){ 
            $aux = strlen($this->base[$i]);
            if($this->n){  // now check same sized elements
                if($aux<>$this->n)
                    throw new \Exception("Not same sized for element 0 and $i in JaitecPassBundle->secret <br/>".print_r($this->base,true));
            }else
                $this->n = $aux;
        }
        
    }
    
    /**
     * generates a random secret with the digits indicated
     * @param byte $digits
     * @return string 
     */
    public function generate($digits = 20){
        $ret = '';
        for ($i=0;$i<$digits;$i++){
            $c = rand(0,$this->n);
            $ret .= substr($this->base[$i % $this->l],$c,1);
        }
        return $ret;
    }
    
    
}
