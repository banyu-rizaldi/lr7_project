<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $table = 'pegawai';

    protected $fillable = [
        'nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar', 'user_id',
    ];

    public function getAvatar(){
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }

        return asset('images/'.$this->avatar);
    }

    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }
}
