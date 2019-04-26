<?php

namespace Vanderb\LaravelShoppette\Classes;

class BaseClass{
    
    protected $attributes = [];
    
    public function __construct(array $attributes = []) {
        $this->fill($attributes);
    }
    
    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key){
        return $this->getAttribute($key);
    }

    /**
     * Dynamically set attributes on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function __set($key, $value){
        $this->setAttribute($key, $value);
    }
    
    /**
     * Fill the model with an array of attributes.
     *
     * @param  array  $attributes
     * @return $this
     *
     */
    public function fill(array $attributes){
        
        foreach($attributes as $key=>$value){
            $this->setAttribute($key, $value);
        }
        
        return $this;
    }
    
    /**
     * Set an attribute
     * @param type $key
     * @param type $value
     * @return $this
     */
    public function setAttribute($key, $value){
        $this->attributes[$key] = $value;

        return $this;
    }
    
    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key){
        if (!$key) {
            return;
        }

        if (array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }
        
        return;
    }
    
    public function toArray(){
        return $this->attributes;
    }
    
    public function toJson(){
        return json_encode($this->attributes);
    }
    
}