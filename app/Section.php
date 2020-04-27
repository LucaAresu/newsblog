<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Section
 *
 * @mixin \Eloquent
 */
class Section extends Model
{

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role_id');
    }


}
