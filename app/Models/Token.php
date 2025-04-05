<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public function belongsTo()
    {
        return $this->belongsTo(User::class);
    }
}
