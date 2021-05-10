<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];    //Disables protection against mass assignment

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/vyz4UqjICyK2J81mHgSS35jg83uADKVZwIUTdT6q.png';
        return '/storage/' . $imagePath;       //$this = model (i.e. Profile class in this case)
    }

    public function followers()
    {
        return $this->belongsToMany(user::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
