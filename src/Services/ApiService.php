<?php

namespace App\Services;

use App\Contracts\ResultsInterface;

abstract class ApiService
{
    /**
     * @var string
     */
    protected $inputFormat;

    /**
     * @var ResultsInterface
     */
    protected $outputFormat;

    /**
     * @var
     */
    protected $results;

    /**
     * ApiService constructor.
     * @param string $inputFormat
     * @param ResultsInterface $outputFormat
     */
    public function __construct($inputFormat = 'json', ResultsInterface $outputFormat)
    {
        $this->inputFormat = $inputFormat;
        $this->outputFormat = $outputFormat;
    }

    /**
     * Perform a query.
     * @param $url
     * @param $parameters
     * @return $this
     */
    public function query($url, $parameters)
    {
        $curl = curl_init();

        $query = $url . '?' . http_build_query($parameters);

        curl_setopt($curl, CURLOPT_URL, $query);

        $this->results = curl_exec($curl);

        curl_close($curl);

        return $this;
    }

    /**
     * Get results.
     * @return mixed
     */
    public function get()
    {
        return $this->outputFormat->toArray($this->results);
    }
}