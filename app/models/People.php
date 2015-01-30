<?php

class People extends Eloquent {

    protected $table = 'people';

    public function scopeRole($query, $role)
    {
        return $query->where('role', $role);
    }

    public function getFullNameAttribute()
    {

        return $this->first_name . ' ' . $this->last_name;

    }

}