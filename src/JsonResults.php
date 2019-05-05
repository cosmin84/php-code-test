<?php

namespace App;

use App\Contracts\ResultsInterface;

class JsonResults implements ResultsInterface
{
    /**
     * @param $data
     * @return array|mixed
     */
    public function toArray($data)
    {
        $return = [];

        $json = json_decode($data);

        foreach ($json as $result) {
            $return[] = [
                'title' => $result->book->title,
                'author' => $result->book->author,
                'isbn' => $result->book->isbn,
                'quantity' => $result->stock->level,
                'price' => $result->stock->price
            ];
        }

        return $return;
    }
}