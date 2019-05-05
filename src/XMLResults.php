<?php

namespace App;

use App\Contracts\ResultsInterface;
use SimpleXMLElement;

class XMLResults implements ResultsInterface
{
    /**
     * @param $data
     * @return array|mixed
     */
    public function toArray($data)
    {
        $return = [];

        $xml = new SimpleXMLElement($data);

        foreach ($xml as $result) {
            $return[] = [
                'title' => $result->book['name'],
                'author' => $result->book['author_name'],
                'isbn' => $result->book['isbn_number'],
                'quantity' => $result->book->stock['number'],
                'price' => $result->book->stock['unit_price']
            ];
        }

        return $return;
    }
}