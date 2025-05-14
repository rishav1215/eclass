<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['cat_title', 'cat_description'];
    public function courses()
{
    return $this->hasMany(Course::class);  // One category can have many courses
}

}
