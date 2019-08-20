<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parliament_id',
        'user_id'
    ];
    /**
     * Get all the users belongs to this role
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the parliament belongs to this role
     */
    public function parliaments()
    {
        return $this->belongsTo(Parliament::class,'parliament_id','id');
    }

    /**
     * Get all the members that have this role
     */
    public function members()
    {
        return $this->hasMany(MemberParliament::class);
    }

}