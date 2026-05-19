<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargingPile extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'charging_piles_table';
    protected $primaryKey = 'id';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'chargerName',
        'phsStatus',
    ];

}
