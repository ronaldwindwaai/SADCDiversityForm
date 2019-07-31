<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parliament extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'country',
        'parliament_type',
        'date_of_inaguration',
        'end_of_term'
    ];

    protected $casts = [
        'date_of_inaguration' => 'date:Y-m-d',
        'end_of_term' => 'date:Y-m-d',
    ];

    /**
     * Get all the users belongs to this role
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the committees that have this role
     */
    public function politicalParties()
    {
        return $this->hasMany(PoliticalParty::class);
    }

    /**
     * Get all the committees that have this role
     */
    public function committees()
    {
        return $this->hasMany(Committee::class);
    }

    /**
     * Get all the committees that have this role
     */
    public function members()
    {
        return $this->hasMany(MemberParliament::class);
    }

    public function getDateOfInaguration($value)
    {
        return date($value,'Y-m-d');
    }
}
