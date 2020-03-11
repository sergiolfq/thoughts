<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thought extends Model
{

    public function user()
    {
        return $this->belongsTo(User::Class);
    }   

}
