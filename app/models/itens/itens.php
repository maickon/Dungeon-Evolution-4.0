<?php

class Itens_Model{

	private $raridade;
	private $tipo_item;
	private $bonus;
	private $nome;
	private $preco;
	private $encaixes;
	private $pedras;
	private $pedras_encaixadas;

	function __construct($tipo = 'luvas', $nivel = null, $raridade = null, $encaixes = null){
		($nivel == null) ? $this->nivel = rand(1,99) : $this->nivel = $nivel;
		($raridade == null) ? $this->item_raridae() : $this->raridade = $raridade;
		$this->item_bonus($tipo);
		if ($encaixes != null) {
			$this->encaixes = 0;
			$this->pedras_encaixadas = 0;
		} else {
			$this->item_encaixes($tipo);
			$this->item_pedras_encaixadas();
		}
		$this->item_nome();
		$this->item_preco($tipo);
	}

	function _get($nome){
		return $this->$nome;
	}

	function item_raridae(){
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

	function item_bonus($tipo){
		$bonus_final = 0;
		$itens = [
			'arma_de_duas_maos' => rand(1,35),
			'arma_de_uma_mao'	=> rand(1,70),
			'armaduras' 		=> rand(1,20),
			'escudos' 			=> rand(1,10),
			'ombreiras' 		=> rand(1,5),
			'botas' 			=> rand(1,5),
			'calcas' 			=> rand(1,15),
			'capacetes' 		=> rand(1,5),
			'luvas' 			=> rand(1,5)
		];

		if (isset($itens[$tipo])) {
			switch ($this->raridade) {
				case 'único': $bonus_final 		= ($itens[$tipo] * $this->nivel)*5;
				break;

				case 'lendário': $bonus_final 	= ($itens[$tipo] * $this->nivel)*4;
				break;

				case 'raro': $bonus_final 		= ($itens[$tipo] * $this->nivel)*3;
				break;

				case 'mágico': $bonus_final 	= ($itens[$tipo] * $this->nivel)*2;
				break;

				case 'comum': $bonus_final 		= ($itens[$tipo] * $this->nivel)*1;
				break;
			}

			$this->tipo_item 	= $tipo;
			$this->bonus 		= $bonus_final;
		} else {
			die('Tipo de item não encontrado.');
		}
	}

	function item_nome(){
		$arquivo = simplexml_load_file("config/locale/pt-br/{$this->tipo_item}.xml") or die('Não foi possível abrir o arquivo xml');
		$arquivo = ((array)$arquivo);
		$this->nome = $arquivo['nome'][array_rand($arquivo['nome'])];
	}

	function item_preco($tipo){
		$preco = 0;

		if ($this->encaixes > 1) {
			$preco += 5000 * $this->encaixes;;
		}

		$itens = [
			'arma_de_duas_maos' => rand(1000,5000),
			'arma_de_uma_mao'	=> rand(1000,3000),
			'armaduras' 		=> rand(1000,15000),
			'escudos' 			=> rand(500,2000),
			'ombreiras' 		=> rand(300,1200),
			'botas' 			=> rand(300,1200),
			'calcas' 			=> rand(1000,8000),
			'capacetes' 		=> rand(300,1200),
			'luvas' 			=> rand(100,1000)
		];

		if (isset($itens[$tipo])) {
			switch ($this->raridade) {
				case 'único': $preco 	+= ($itens[$tipo] * $this->nivel)*5;
				break;

				case 'lendário': $preco += ($itens[$tipo] * $this->nivel)*4;
				break;

				case 'raro': $preco 	+= ($itens[$tipo] * $this->nivel)*3;
				break;

				case 'mágico': $preco 	+= ($itens[$tipo] * $this->nivel)*2;
				break;

				case 'comum': $preco 	+= ($itens[$tipo] * $this->nivel)*1;
				break;
			}

			$this->preco 	= $preco;
		} else {
			die('Tipo de item não encontrado.');
		}
	}

	function item_encaixes($tipo){
		if ($this->raridade == 'comum') {
			$this->encaixes = 0;
		} else {
			$itens = [
				'aneis'				=> rand(0,1),
				'arma_de_duas_maos' => rand(0,3),
				'arma_de_uma_mao'	=> rand(0,3),
				'armaduras' 		=> rand(0,3),
				'escudos' 			=> rand(0,3),
				'ombreiras' 		=> rand(0,2),
				'botas' 			=> rand(0,1),
				'calcas' 			=> rand(0,2),
				'capacetes' 		=> rand(0,1),
				'luvas' 			=> rand(0,2)
			];

			if (isset($itens[$tipo])) {
				$maximo = 1000 - ($this->nivel * rand(1,10));
				$probabilidade = rand(1, $maximo);
				if ($maximo > 1000 || $probabilidade < 400) {
					$this->encaixes = $itens[$tipo];
				} else {
					$this->encaixes = 0;
				}
			} else {
				die('Tipo de item não encontrado.');
			}
		}
	}

	function item_pedras_encaixadas(){
		if ($this->encaixes > 0) {
			$maximo = 1000 - ($this->nivel * rand(1,10));
			$probabilidade = rand(1, $maximo);
			if ($maximo > 1000 || $probabilidade < 200) {
				$this->pedras_encaixadas = rand(0, $this->encaixes);
			} else {
				$this->pedras_encaixadas = 0;
			}
		} else {
			$this->pedras_encaixadas = 0;
		}
	}

	function item_encaixar_pedra(){
		$pedras = ['rubi','esmeralda','safira','topazio','ametista','diamante'];
		$habilidades = [
			'rubi'		=> ['dano','experiencia'],
			'esmeralda'	=> ['esquiva','critico_induzido'],
			'safira'	=> ['defesa','vida'],
			'topazio'	=> ['dano','mana'],
			'ametista'	=> ['dano','mana'],
			'diamante'	=> ['dinheiro','drop_level'],
			'opala'		=> ['dano','experiencia','esquiva','critico_induzido','defesa','vida','dinheiro','drop_level']
		];

		$pedra_escolhida = '';

		if ($this->pedras_encaixadas == 0) {
			return 0;
		} elseif ($this->pedras_encaixadas == 1) {
			if (rand(1,1000) == 1) {
				$pedra_escolhida = 'opala';

				$this->pedras = new Pedras_Model;
				$this->pedras->_set('nivel',$this->nivel);
				$this->pedras->_set('raridade',$this->raridade);
				$this->pedras->_set('nome',$pedra_escolhida);
				
				$opala 		= $habilidades['opala'];
				$metodo1 	= "pedra_{$opala[array_rand($opala)]}";
				$metodo2 	= "pedra_{$opala[array_rand($opala)]}";
				$this->pedras->$metodo1();
				$this->pedras->$metodo2();
				$this->pedras->pedra_preco();
			} else {
				$pedra_escolhida 		= $pedras[array_rand($pedras)];
				$quantidade_habilidades = rand(1,2);
				
				$this->pedras = new Pedras_Model;
				$this->pedras->_set('nivel',$this->nivel);
				$this->pedras->_set('raridade',$this->raridade);
				$this->pedras->_set('nome',$pedra_escolhida);
				if ($quantidade_habilidades == 1) {
					$metodo = $habilidades[$pedra_escolhida];
					$metodo = $metodo[array_rand($metodo)];
					$metodo = "pedra_{$metodo}";
					$this->pedras->$metodo();
					$this->pedras->pedra_preco();
				} else {
					$metodo1 = "pedra_{$habilidades[$pedra_escolhida][0]}";
					$metodo2 = "pedra_{$habilidades[$pedra_escolhida][1]}";
					$this->pedras->$metodo1();
					$this->pedras->$metodo2();
					$this->pedras->pedra_preco();
				}
			}
		} else {
			for ($i=0; $i < $this->pedras_encaixadas; $i++) {
				if (rand(1,1000) == 1) {
					$pedra_escolhida = 'opala';
					
					$this->pedras[$i] = new Pedras_Model;
					$this->pedras[$i]->_set('nivel',$this->nivel);
					$this->pedras[$i]->_set('raridade',$this->raridade);
					$this->pedras[$i]->_set('nome',$pedra_escolhida);
					
					$opala 		= $habilidades['opala'];
					$metodo1 	= "pedra_{$opala[array_rand($opala)]}";
					$metodo2 	= "pedra_{$opala[array_rand($opala)]}";
					$this->pedras[$i]->$metodo1();
					$this->pedras[$i]->$metodo2();
					$this->pedras[$i]->pedra_preco();
				} else {
					$pedra_escolhida 		= $pedras[array_rand($pedras)];
					$quantidade_habilidades = rand(1,2);
					$this->pedras[$i] = new Pedras_Model;
					$this->pedras[$i]->_set('nivel',$this->nivel);
					$this->pedras[$i]->_set('raridade',$this->raridade);
					$this->pedras[$i]->_set('nome',$pedra_escolhida);
					if ($quantidade_habilidades == 1) {
						$metodo = $habilidades[$pedra_escolhida];
						$metodo = $metodo[array_rand($metodo)];
						$metodo = "pedra_{$metodo}";
						$this->pedras[$i]->$metodo();
						$this->pedras[$i]->pedra_preco();
					} else {
						$metodo1 = "pedra_{$habilidades[$pedra_escolhida][0]}";
						$metodo2 = "pedra_{$habilidades[$pedra_escolhida][1]}";
						$this->pedras[$i]->$metodo1();
						$this->pedras[$i]->$metodo2();
						$this->pedras[$i]->pedra_preco();
					}
				}
			}
		}
	}
}