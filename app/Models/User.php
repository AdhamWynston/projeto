<?php

namespace App\Models;

use App\Notifications\UserCreated;
use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    const ROLE_ADMIN = 1;
    const ROLE_COORDINATOR = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->hasOne(Profile::class)->withDefault();
    }

    public static function createFully($data){
        $password = str_random(6);
        $data['password'] = $password;
        /** @var  User $user */
        $user = parent::create($data);
        self::assingRole($user, $data['type']);
        $user->save();
        if(isset($data['send_mail'])){
            $token = \Password::broker()->createToken($user);
            $user->notify(new UserCreated($token));
        }
        return $user;
    }
    public static function assingRole(User $user, $type){
        $types = [
            self::ROLE_ADMIN => Admin::class,
            self::ROLE_COORDINATOR => Coordinator::class,
        ];
        $model = $types[$type];
        $model = $model::create([]);
        $user->userable()->associate($model);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'user' => [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'status' => $this->status,
                'role' => $this->role
            ]
        ];
    }
}
