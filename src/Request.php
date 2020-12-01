<?php

namespace TradeApp;

class Request
{
    public function __construct($params = [])
    {
        foreach ($params as $name => $value) {
            $this->{$name} = $value;
        }
    }
}
