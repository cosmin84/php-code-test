<?php

namespace App\Contracts;

interface ResultsInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function toArray($data);
}