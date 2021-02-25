<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    // fillable artinya yang bisa diisi, guarded sebaliknya
    // protected $fillable = ['name'];
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];

    public function edulevel()
    {
        return $this->belongsTo('App\Edulevel');
    }
}
