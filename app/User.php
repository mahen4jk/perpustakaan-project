<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'gender', 'phone', 'roles', 'email', 'password',
        'avatar', 'username', 'status'
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

    public function insUser($petugas)
    {
        if ($petugas->hasFile('avatar')) {
            $file = $petugas->file('avatar');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;

            // Pindahkan file ke folder yang dituju
            $file->move(public_path('image/user'), $fileName);
            $avatar = $fileName;
        } else {
            $avatar = NULL;
        }

        DB::table('users')->insert([
            'name' => $petugas->name,
            'username' => $petugas->username,
            'avatar' => $avatar,
            'address' => $petugas->address,
            'gender' => $petugas->gender,
            'phone' => $petugas->phone,
            'roles' => $petugas->roles,
            'email' => $petugas->email,
            'password' => bcrypt($petugas->password),
            'status' => $petugas->status,
            'created_at' => now()
        ]);
    }

    public function edit($idPTG)
    {
        # memunculkan data kategori ke form untuk di ubah...
        DB::table('users')->where('id', $idPTG)->get();
    }

    public function upUser($petugas)
    {
        if ($petugas->hasFile('avatar')) {
            $file = $petugas->file('avatar');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;

            // Pindahkan file ke folder yang dituju
            $file->move(public_path('image/user'), $fileName);
            $avatar = $fileName;
        } else {
            $avatar = NULL;
        }

        // DB::table('users')->where('id', $petugas->id)->update([
        //     'name' => $petugas->name,
        //     'username' => $petugas->username,
        //     'avatar' => $avatar,
        //     'address' => $petugas->address,
        //     'gender' => $petugas->gender,
        //     'phone' => $petugas->phone,
        //     'roles' => $petugas->roles,
        //     'email' => $petugas->email,
        //     'password' => bcrypt($petugas->password),
        //     'status' => $petugas->status,
        //     'updated_at' => now()
        // ]);

        DB::table('users')->where('id',$petugas->id)->update([
            'name' => $petugas->name,
            'username' => $petugas->username,
            'avatar' => $avatar,
            'address' => $petugas->address,
            'gender' => $petugas->gender,
            'phone' => $petugas->phone,
            'roles' => $petugas->roles,
            'email' => $petugas->email,
            'password' => bcrypt($petugas->password),
            'status' => $petugas->status,
            'created_at' => now()
        ]);
    }
}
