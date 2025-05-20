<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class History extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'CO',
        'FEV1',
        'FVC',
        'user_id',
        'Date',
        'Status',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}