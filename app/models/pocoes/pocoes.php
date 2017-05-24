<?php

class Pocoes_Model{

	private $nivel;
	private $tipo;
	private $raridade;
	private $preco;

	function __construct($tipo = '', $nivel = null, $raridade = null){
		($nivel == null) ? $this->nivel = rand(1,99) : $this->nivel = $nivel;
		($raridade == null) ? $this->pocao_raridae() : $this->raridade = $raridade;
		$this->pocao_descricao($tipo);
		$this->pocao_preco($tipo);
	}

	function _get($nome){
		return $this->$nome;
	}

	function _indice($raridade){
		switch ($this->raridade) {
			case 'único': $indice = 5;
			break;

			case 'lendário': $indice = 4;
			break;

			case 'raro': $indice = 3;
			break;

			case 'mágico': $indice = 2;
			break;

			case 'comum': $indice = 1;
			break;
		}
		return $indice;
	}

	function pocao_raridae(){
		$maximo = 1000 - ($this->nivel * rand(1,10));
		$probabilidade = rand(1, $maximo);

		if ($maximo > 1000) {
			$raridade = 'unico';
		} else {
			if ($probabilidade <= 10) {
				$raridade = 'único';
			} elseif ($probabilidade > 10 and $probabilidade <= 100) {
				$raridade = 'lendário';
			} elseif ($probabilidade > 100 and $probabilidade <= 200) {
				$raridade = 'raro';
			} elseif ($probabilidade > 100 and $probabilidade <= 400) {
				$raridade = 'mágico';
			}elseif ($probabilidade > 400 and $probabilidade <= 1000) {
				$raridade = 'comum';
			}
		}
		$this->nivel 	= $this->nivel;
		$this->raridade = $raridade;
	}

	function pocao_preco($tipo){
		$bonus_final = 0;
		$itens = [
			'cura' 				=> rand(100,400),
			'remover_veneno'	=> rand(100,200),
			'remover_cegueira' 	=> rand(50,100),
			'remover_doença' 	=> rand(100,150),
			'mana' 				=> rand(100,600)
		];

		if (isset($itens[$tipo])) {
			switch ($this->raridade) {
				case 'único': $preco_final 		= ($itens[$tipo] * $this->nivel)*5;
				break;

				case 'lendário': $preco_final 	= ($itens[$tipo] * $this->nivel)*4;
				break;

				case 'raro': $preco_final 		= ($itens[$tipo] * $this->nivel)*3;
				break;

				case 'mágico': $preco_final 	= ($itens[$tipo] * $this->nivel)*2;
				break;

				case 'comum': $preco_final 		= ($itens[$tipo] * $this->nivel)*1;
				break;
			}

			$this->tipo 		= $tipo;
			$this->preco 		= $preco_final;
			$this->nome 		= 'Poção de '.ucfirst(str_replace('_', ' ', $tipo));
		} else {
			die('Tipo de item não encontrado.');
		}
	}

	function pocao_descricao($tipo){
		switch ($tipo) {
			case 'cura':$this->pocao_cura();
			break;

			case 'remover_veneno':$this->pocao_doenca();
			break;

			case 'remover_cegueira':$this->pocao_cegueira();
			break;

			case 'remover_doença':$this->pocao_veneno();
			break;

			case 'mana':$this->pocao_mana();
			break;
		}
	}

	function pocao_cura(){
		$cura = (50 * $this->nivel) * $this->_indice($this->raridade);
		$this->descricao = "Esta poção é capaz de recuperar {$cura} pontos de vida após consumida por inteiro. Beber uma poção demora uma rodada.";
	}

	function pocao_doenca(){
		$nivel = $this->nivel * $this->_indice($this->raridade);
		$this->descricao = "Esta poção remove status de doença até nível {$nivel}. Isso quer dizer que se você contraiu uma doença de nível 10 por exemplo, somente uma poção de nível 11 ou maior poder remover este status de doença.";
	}

	function pocao_cegueira(){
		$nivel = $this->nivel * $this->_indice($this->raridade);
		$this->descricao = "Esta poção remove status de cegueira até nível {$nivel}. Isso quer dizer que se você contraiu uma cegueira de nível 5 por exemplo, somente uma poção de nível 6 ou maior poder remover este status de cegueira.";	
	}

	function pocao_veneno(){
		$nivel = $this->nivel * $this->_indice($this->raridade);
		$this->descricao = "Esta poção remove status de veneno até nível {$nivel}. Isso quer dizer que se você sofreu algum efeito de veneno de nível 5 por exemplo, somente uma poção de nível 6 ou maior poder remover o status de veneno em você.";	
	}

	function pocao_mana(){
		$mana = (25 * $this->nivel) * $this->_indice($this->raridade);
		$this->descricao = "Esta poção é capaz de recuperar {$mana} pontos de mana após consumida por inteiro. Beber umapoção demora uma rodada.";
	}
}