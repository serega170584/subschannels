<?php
namespace Serega170584\Subschannels\Models;

use Illuminate\Database\Eloquent\Model;

class Subschannels extends Model
{
    protected $table = 'subscribe_channels';

    protected $fillable = ['name'];

    public $timestamps = false;

}