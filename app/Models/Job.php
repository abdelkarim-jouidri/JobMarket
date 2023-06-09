<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'status', 'description', 'location', 'contract_type'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
