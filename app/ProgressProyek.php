<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgressProyek extends Model
{
    protected $table = 'progress_proyek';

    public function statusProyek()
	{
		return $this->belongsTo('App\Status', 'status');
	}
}
