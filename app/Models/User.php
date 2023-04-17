<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Job;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'fullname',
    //     'email',
    //     'password',
    // ];
        protected $guarded = [];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function assignRole($role){
         $this->roles()->save($role);
    }

    public function isEmployer(){
        $roles = $this->roles;
        foreach($roles as $role) {
            if($role->name=='employer'){
                return true;
            }
        }
        return false;
    }

    public function isCandidate(){
        $roles = $this->roles;
        foreach($roles as $role) {
            if($role->name=='candidate'){
                return true;
            }
        }
        return false;
    }
}
