<?php

namespace App\Services;

use App\Contracts\NumberInterface;

class FixedNumber implements NumberInterface
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
    public function __construct($prefix = "Fixed Number: ")
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
        return $this->prefix . 100;
    }
}
