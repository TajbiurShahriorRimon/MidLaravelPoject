<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orgCampaign extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'eventId';
    public $timestamps = false;
}
