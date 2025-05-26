<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Fingerprint extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        
        'user_id',
        'id_fingerprint',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}