<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Role;
use App\Models\OrderStatus;
use App\Models\Budget;
use App\Models\FstStatus;
use App\Models\StoreStatus;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'role_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Role(){
        return $this->belongsTo(Role::class);
    }

    public function OrderStatus(){
        return $this->belongsToMany(OrderStatus::class);
    }

    public function Budget(){
        return $this->belongsToMany(Budget::class);
    }

    public function FstStatus(){
        return $this->belongsToMany(FstStatus::class);
    }

    public function StoreStatus(){
        return $this->belongsToMany(StoreStatus::class);
    }    
}
