<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boot extends Model
{
    use HasFactory;

    protected $table = 'boot';

    protected $guarded = ['id'];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
