<?php

namespace Vanderb\LaravelShoppette\Services;

class BaseService {
    
    protected $model;
    
    public function __call($name, $arguments) {
        return $this->model->{$name}($arguments);
    }

    
}