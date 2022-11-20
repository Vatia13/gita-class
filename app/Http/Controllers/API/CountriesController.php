<?php

namespace App\Http\Controllers\Api;

class CountriesController
{
    protected $countries = ['ge'=>'Georgia', 'ua'=>'Ukraine', 'cn'=>'China', 'tr'=>'Turkey', 'sp'=>'Spain', 'fr'=>'France'];

    /**
     * Countries list in json format
     *
     * @return Array;
     */
    public function countries()
    {
        return $this->countries;
    }

    /**
     * Return specific country
     *
     * @param String $code
     * @return String
     */
    public function country($code)
    {
        return $this->countries[$code];
    }

    /**
     * Editi specific country by its code
     *
     * @param String $code
     * @return String
     */
    public function edit($code)
    {
        return "Editing country: " . $this->countries[$code];
    }

    /**
     * Store country
     *
     * @return String
     */
    public function store()
    {
        return "Country added";
    }

    /**
     * Update country
     *
     * @return String
     */
    public function update()
    {
        return "Country updated";
    }

    /**
     * Return all routes depending on countries group
     *
     * @return Array
     */
    public function all()
    {
        return [
            route('countries.index'),
            route('countries.code', ['code' => 'ge']),
            route('countries.edit', ['code' => 'ge']),
            route('countries.store'),
            route('countries.update'),
            route('countries.all')
        ];
    }
}
