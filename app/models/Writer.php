<?php

class Writer extends Eloquent {

    protected $table = 'people';

    public function getFullNameAttribute()
    {

        return $this->first_name . ' ' . $this->last_name;

    }

}