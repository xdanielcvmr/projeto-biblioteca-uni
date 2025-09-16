<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'title', 'author', 'year', 'gender_id', 'cover'];

    public function gender() {
        return $this->belongsTo(Gender::class);
    }
}
