<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSkm extends Model
{
    public function skm(){
        return $this->belongsTo(DataUser::class, 'user_id')->withDefault();
    }
}
