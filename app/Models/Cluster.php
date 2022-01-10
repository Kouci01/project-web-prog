<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function clusterSccs(){
        return $this->hasMany(ClusterScc::class);
    }

    public function subjects(){
        return $this->hasMany(Subjects::class);
    }

}
