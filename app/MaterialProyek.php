<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialProyek extends Model
{
    protected $table = 'material_proyek';

    public function material()
	{
		return $this->belongsTo('App\Material', 'id_material');
	}
}
