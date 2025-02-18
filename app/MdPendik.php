<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MdPendik extends Authenticatable
{
    //
    use Notifiable;
    //
    protected $guard = 'pendik';

    protected $table = 'tb_pendik';
    protected $primarykey = 'id_pendik';
    public $incrementing = 'id_pendik';
    public $timestamps = false;

    protected $fillable = [
        'nip', 'nama_pendik', 'j_kelamin', 'roles',
        'username', 'password', 'avatar', 'created_at', 'update_at'
    ];

    protected $hidden = [
        'password',
    ];

    // Menentukan field yang digunakan untuk autentikasi
    public function getAuthIdentifierName()
    {
        return 'username'; // Atau field lain yang Anda gunakan untuk login
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function insPendik($pendik)
    {
        if ($pendik->hasFile('avatar')) {
            $file = $pendik->file('avatar');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;

            // Pindahkan file ke folder yang dituju
            $file->move(public_path('image/user'), $fileName);
            $avatar = $fileName;
        } else {
            $avatar = NULL;
        }

        DB::table('tb_pendik')->insert([
            'nip' => $pendik->nip,
            'nama_pendik' => $pendik->nama_pendik,
            'j_kelamin' => $pendik->j_kelamin,
            'roles' => $pendik->roles,
            'username' => $pendik->username,
            'password' => bcrypt($pendik->password),
            'avatar' => $avatar,
            'created_at' => now()
        ]);
    }

    public function editPendik($idPNDK)
    {
        # memunculkan data kategori ke form untuk di ubah...
        DB::table('tb_pendik')->where('id_pendik', $idPNDK)->get();
    }

    public function uptPendik($pendik)
    {
        if ($pendik->hasFile('avatar')) {
            $file = $pendik->file('avatar');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;

            // Pindahkan file ke folder yang dituju
            $file->move(public_path('image/user'), $fileName);
            $avatar = $fileName;
        } else {
            $avatar = NULL;
        }

        DB::table('tb_pendik')->where('id_pendik', $pendik->id_pendik)->update([
            'nip' => $pendik->nip,
            'nama_pendik' => $pendik->nama_pendik,
            'j_kelamin' => $pendik->j_kelamin,
            'roles' => $pendik->roles,
            'username' => $pendik->username,
            'password' => bcrypt($pendik->password),
            'avatar' => $avatar,
            'updated_at' => now()
        ]);
    }
}
