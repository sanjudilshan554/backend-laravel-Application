<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\kuppi;

class kuppi extends Model
{
    use HasFactory;

    protected $fillable=[
            'kuppiname',
            'registrations_id', //this mean when user sign in their id contain with this id as a foreign key
            'subject',
            'freetime',
            'place',
            'seniorName',
            'senioremail',
            'seniourregid',
            'on/off',
            'members',
    ];

    public function kuppi(){
        return $this->belongsTo(kuppi::class);
    }

}