<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberParliament extends Model
{
    protected $table = 'mps';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'deputy_id',
        'gender',
        'date_of_birth',
        'erpp',
        'eppd',
        'user_id',
        'political_party_id',
        'parliament_id',
        'committee_id'
    ];

    protected $casts = [
        'committee_id' => 'array'
    ];

    /**
     * Get all the users belongs to this role
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the political Party belongs to this role
     */
    public function politicalParty()
    {
        return $this->belongsTo(PoliticalParty::class);
    }
    /**
     * Get all the parliament belongs to this role
     */
    public function parliament()
    {
        return $this->belongsTo(Parliament::class);
    }

}