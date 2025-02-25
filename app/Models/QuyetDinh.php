<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuyetDinh extends Model
{
    protected $fillable = [
        'nam',
        'soHieu',
        'trichYeu',
        'path'
    ];

    protected $table = 'ql_quyet-dinh';


}
