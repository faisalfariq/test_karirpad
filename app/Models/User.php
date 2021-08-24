<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'nik',
        'nama_pegawai',
        'jenis_kelamin',
        'nope',
        'id_departement',
        'id_jabatan',
        'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function departements()
    {
        return $this->belongsTo('App\Models\Departement','id_departement');
    }
    public function jabatans()
    {
        return $this->hasOne('App\Models\Jabatan','id_pegawai');
    }
    public function absensis()
    {
        return $this->belongsTo('App\Models\Absensi','id_pegawai');
    }
}
