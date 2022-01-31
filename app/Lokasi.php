<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Lokasi extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'gambar',
        'keterangan'
    ];

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $user = Auth::user();
            if($user){
                $model->user_id = $user->id;
            }
        });

        self::updating(function($model){
            $user = Auth::user();
            if($user){
                $model->user_id = $user->id;
            }
        });
    }
}
