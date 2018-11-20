<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function class() {
        return $this->belongsTo(Classes::class);
    }
}
