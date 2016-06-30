<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdutosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('produtos', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nome', 45);
			$table->decimal('preco', 10, 2);
			$table->string('imagem', 60);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('produtos');
	}
}
