<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'contacts';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'phone',
        'label',
        'emails',
        'display_name',
        'given_name',
        'middle_name',
        'family_name',
        'organization',
        'status',
    ];
}
