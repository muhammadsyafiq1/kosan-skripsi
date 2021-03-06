<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodespacePhoto extends Model
{
    use HasFactory;

    public function kos()
    {
    	return $this->belongsTo(Codespace::class,'kos_id','id');
    }
}
