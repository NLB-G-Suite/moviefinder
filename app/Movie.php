<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Movie extends Model
{
    use Searchable;

    public function extra() {
		return $this->hasOne('App\Extra');
	}
}
