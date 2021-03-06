<?php

/**
 * (c) Joseluis Laso <wld1373@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Jaitec\PassBundle\Generator;


interface PassGeneratorInterface
{

    /**
     * generates a random password with the digits indicated
     * @param byte $digits
     * @return string 
     */
    public function generate($digits=8);

    
}
