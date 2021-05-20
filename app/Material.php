<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';

    public function jenis()
	{
		return $this->belongsTo('App\Jenis', 'jenis_id');
	}

	public function cabang()
	{
		return $this->belongsTo('App\Cabang', 'cabang_id');
	}

	public function status()
	{
		return $this->belongsTo('App\Status', 'status_id');
	}
}
