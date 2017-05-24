<?php
/*
	Classe gerada pelo Build_Core 
	@author Maickon Rangel
	Prodigio Framework - 2017
	Controller: ficha
*/

class Bestiario_Controller extends Controller_Core {

	function __construct(){
		$this->meta_title = 'Dungeon Evolution';
		$this->meta_description = 'Site oficial do RPG Dungeon Evolution. Venha conhecer este RPG e se divertir.';
		$this->meta_keywords = 'rpg,rpg de mesa,evolução,dungeon evolution,criaturas bestiário';
	}

	function index(){
		
		if (isset($_REQUEST['nivel']) and isset($_REQUEST['nivel_fixo'])) {
			if ($_REQUEST['nivel_fixo'] == 'sim'){
				$nivel = $_REQUEST['nivel'];
			} else {
				$nivel = mt_rand(1, $_REQUEST['nivel']);
			}
		} else {
			$nivel = mt_rand(1,99);
		}

		if (isset($_REQUEST['tipo'])) {
			$tipo = $_REQUEST['tipo'];
		} else {
			$tipo = 'sorteado';
		}

		if (isset($_REQUEST['tamanho'])) {
			$tamanho = $_REQUEST['tamanho'];
		} else {
			$tamanho = 'sorteado';
		}

		if (isset($_REQUEST['rolagem_fixa'])) {
			$rolagem_fixa = $_REQUEST['rolagem_fixa'];
		} else {
			$rolagem_fixa = 'nao';
		}

		if (isset($_REQUEST['distribuicao_fixa'])) {
			$distribuicao_fixa = $_REQUEST['distribuicao_fixa'];
		} else {
			$distribuicao_fixa = 'nao';
		}

		if (isset($_REQUEST['dado_de_rolagem'])) {
			$dado_de_rolagem = $_REQUEST['dado_de_rolagem'];
		} else {
			$dado_de_rolagem = 6;
		}

		if (isset($_REQUEST['raridade'])) {
			$raridade = $_REQUEST['raridade'];
		} else {
			$raridade = 'sorteado';
		}

		if (isset($_REQUEST['quantidade'])) {
			$quantidade = $_REQUEST['quantidade'];
		} else {
			$quantidade = 1;
		}

		$criaturas = [];

		for ($i=0; $i < $quantidade; $i++) { 
			$criatura = new Bestiario_Model;
			if ($tipo == 'sorteado') {
				$tipos = ['animal','constructo','espirito','humanoide','monstro','morto-vivo'];
				$tipo = $tipos[array_rand($tipos)];
			}

			if ($tamanho == 'sorteado') {
				$tamanhos = ['infimo','diminuto','minimo','pequeno','medio','grande','enorme','descomunal','colossal'];
				$tamanho = $tamanhos[array_rand($tamanhos)];
			}

			if ($raridade == 'sorteado') {
				$raridades = ['comum','magico','raro','lendario','unico'];
				$raridade = $raridades[array_rand($raridades)];
			}

			$criatura->_set('tamanho', $tamanho);
			$criatura->_set('tipo', $tipo);
			$criatura->_set('nivel',$nivel);
			$criatura->set_criatura($raridade, $rolagem_fixa, $distribuicao_fixa, $dado_de_rolagem);
			$criatura->set_habilidades();
			$criaturas[] = $criatura;
		}

		require $this->controller_render('index');
	}
}