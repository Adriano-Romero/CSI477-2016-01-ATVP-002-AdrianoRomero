<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable {
	protected $guard = "clientes";

	public $timestamps = false;
	protected $fillable = [
		'nome', 'login',
	];
	protected $hidden = [
		'senha',
	];

	public function compra() {
		return $this->belongsTo('Compra');
	}
}
