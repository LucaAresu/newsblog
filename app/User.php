<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * App\User
 *
 * @mixin \Eloquent
 */

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isStaff() {
        if($this->isAdmin)
            return true;
        $sections = $this->sections;
        foreach($sections as $section)
            if($this->getRole($section)->isStaff)
                return true;
        return false;

    }

    public function sections()
    {
        return $this->belongsToMany(Section::class)->withPivot('role_id');
    }

    public function getRole(Section $section) {
        if($this->hasRole($section))
            return Role::find($this->sections()->where('section_id', $section->id)->first()->pivot->role_id);
        else
            return Role::where('name','User')->first();
    }

    public function hasRole(Section $section)
    {
        return (boolean) $this->sections()->find($section->id);
    }

    public function promote(Section $section, Role $role)
    {
        if(!$this->hasRole($section ))
            $this->sections()->attach($section->id, ['role_id' => $role->id]);
        else
            $this->sections()->update(['section_id' => $section->id, 'role_id' => $role->id]);
    }
}
