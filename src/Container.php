<?php

namespace App;

class Container
{
    protected $bindings = [];

    public function __construct()
    {
        // Initialization code here if needed
    }

    public function bind($abstract, $concrete)
    {
        $this->bindings[$abstract] = $concrete;
    }

    public function make($abstract)
    {
        if (!isset($this->bindings[$abstract])) {
            throw new \Exception("No binding found for {$abstract}");
        }

        $concrete = $this->bindings[$abstract];
        return $concrete instanceof \Closure ? $concrete($this) : $concrete;
    }
}
