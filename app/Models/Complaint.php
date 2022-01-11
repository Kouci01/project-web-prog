<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'complaints';
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}