<?php

namespace App\Support;

class Collection
{
    protected $items;

    public function __construct($items)  // data passing from collectionTest
    {
        $this->items = $items;
    }

    public function getData()
    {
        $data = [];

        foreach($this->items as $item) {

            $data[] = $item;  //put all item in array
            
        }

        return $data;         // returning data 
    }
}