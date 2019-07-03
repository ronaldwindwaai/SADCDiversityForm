<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliticalParty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'political_designation',
        'user_id',
        'parliament_id',
    ];

    /**
     * Get all the users belongs to this role
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the committees belongs to this role
     */
    public function parliament()
    {
        return $this->belongsTo(Parliament::class);
    }
    /**
     * Get all the members that have this role
     */
    public function members()
    {
        return $this->hasMany(MemberParliament::class);
    }
}
