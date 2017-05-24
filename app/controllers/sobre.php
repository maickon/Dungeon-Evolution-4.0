<?php

class Sobre_Controller extends Controller_Core{

	function __construct(){
		$this->meta_title = 'Dungeon Evolution';
		$this->meta_description = 'Site oficial do RPG Dungeon Evolution.';
		$this->meta_keywords = 'rpg,rpg de mesa,evolução,dungeon evolution, ficha de rpg, itens mágicos';
	}

	function index(){
		require $this->controller_render('index');
	}
}