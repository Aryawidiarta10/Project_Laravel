<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupuk extends Model
{
    //
    protected $table='pupuk';
    protected $primaryKey='id_pupuk';
    protected $fillable=['nama_pupuk','keterangan'];
}
