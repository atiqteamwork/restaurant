<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Fillable field for a categoty
     */
    protected $fillable = ['name', 'company', 'phone', 'email', 'address_line1', 'address_line2', 'city', 'postal_code', 'state', 'country'];

    /**
     * Get the users of the customers.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Set the email.
     *
     * @param  string  $value
     * @return void
     */
    public function setEmailAttribute($value) {
        $this->attributes['email'] = !empty($value) ? $value : NULL;
    }
}
