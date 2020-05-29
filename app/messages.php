<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    protected $fillable =[
        'coach_id' , 'member_id' , 'message' ,'Sender' ,'subject'
    ];
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
