<?php

namespace App;

use App\Services\ApiService;

class ConcreteApi extends ApiService
{
    /**
     * @var string
     */
    protected $url = "https://www.example.com/v1/api/";

    /**
     * @param $authorName
     * @param int $limit
     * @return mixed
     */
    public function getBooksByAuthor($authorName, $limit = 10)
    {
        return $this->query($this->url, ['author' => $authorName, 'limit' => $limit])->get();
    }

    /**
     * @param $year
     * @param int $limit
     * @return mixed
     */
    public function getBooksByYearPublished($year, $limit = 10)
    {
        return $this->query($this->url, ['year' => $year, 'limit' => $limit])->get();
    }
}