<?php

namespace App\Services;

use App\Contracts\NumberInterface;

class RandomNumber implements NumberInterface
{
    /**
     * Prefix of random number
     *
     * $prefix String
     */
    protected $prefix;

    /**
     * Random number constructor
     *
     * @params $prefix String
     */
    public function __construct($prefix = "Random Number: ")
    {
        $this->prefix = $prefix;
    }

    /**
     * Get random number with its prefix
     *
     * @return String
     */
    public function get()
    {
        return $this->prefix . rand(0, 9999999);
    }
}
