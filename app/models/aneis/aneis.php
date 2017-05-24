<?php


class Aneis_Model{

	private $nivel;
	private $anel;
	private $encaixes;
	private $pedras_encaixadas;
	private $pedras;
	private $preco;

	function __construct($nivel = null, $raridade = null, $encaixes = null){
		($nivel == null) ? $this->nivel = rand(1,99) : $this->nivel = $nivel;
		($raridade == null) ? $this->item_raridae() : $this->raridade = $raridade;
		$this->item_nome();
		if ($encaixes != null) {
			$this->encaixes = 0;
			$this->pedras_encaixadas = 0;
		} else {
			$this->item_encaixes();
			$this->item_pedras_encaixadas();
			$this->item_encaixar_pedra();
		}
		$this->item_descricao();
		$this->item_preco();
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

	function item_nome(){
		$arquivo = simplexml_load_file("config/locale/pt-br/aneis.xml") or die('Não foi possível abrir o arquivo xml');
		$arquivo = ((array)$arquivo);
		$this->anel = $arquivo['anel'][array_rand($arquivo['anel'])];

	}

	function item_preco(){
		$preco = 0;

		if ($this->encaixes == 1) {
			$preco += 5000;
		}
		switch ($this->raridade) {
			case 'único': $preco 	+= (mt_rand(10000,15000) * $this->nivel)*5;
			break;

			case 'lendário': $preco += (mt_rand(10000,15000) * $this->nivel)*4;
			break;

			case 'raro': $preco 	+= (mt_rand(10000,15000) * $this->nivel)*3;
			break;

			case 'mágico': $preco 	+= (mt_rand(10000,15000) * $this->nivel)*2;
			break;

			case 'comum': $preco 	+= (mt_rand(10000,15000) * $this->nivel)*1;
			break;
		}

		$this->preco 	= $preco;
	}

	function item_descricao(){
		$raridade = $this->_indice($this->raridade);
		$codigos = [
			'*%'		=> ($this->nivel*$raridade).'%', 			//porcentagem 		5% Lv => 1
			'*VF'		=> (($this->nivel * rand(1,10))*$raridade), //valor_fixo		10 a 50 => lv 1
			'*VBF'		=> ($this->nivel * $raridade), 				//valor baixo fixo	1 a 5 => lv 1
			'*M%'		=> ($this->nivel*$raridade).'%', 			//mana 				5% Lv => 1
			'*N%'		=> ($this->nivel+$raridade).'%', 			//critico_natural 	5% Lv => 1
			'*I%'		=> ($this->nivel*$raridade).'%', 			//critico_induzido	5% Lv => 1
			'*D'		=> (rand(1, $this->nivel)*$raridade), 		//deslocamento		valor fixo 5 => Lv 1
			'*V%'		=> (rand(1, $this->nivel)+$raridade).'%', 	//velocidade_acao	valor fixo 5 => Lv 1
			'*E%'		=> (rand(1, $this->nivel)+$raridade).'%', 	//esquiva			valor fixo 5 => Lv 1
			'*PM%'		=> (rand(1, $raridade + 1)).'%',  			//porcentagem_min	2 a 6
			'*qtd'		=> (rand(2, $raridade + 1)),  				//quantidade 		2 a 6
			'*espaco'	=> (rand(1, $raridade+$this->nivel)).'cm³', //espaco cubico 	1 a 6 Lv => 1
			'*ML'		=> (rand(1, $raridade+$this->nivel)), 		//Moral level 		1 a 6 Lv => 1
			'*PB'		=> (rand(1, $raridade+$this->nivel + 1)).'%'//Porcentagem baixa 1 a 2 Lv => 1
			];

		foreach ($codigos as $key => $value) {
			if($descricao = str_replace($key, $value, $this->anel->descricao)){
				$this->anel->descricao = $descricao;
			}
		}

		$this->anel->descricao = $descricao;
	}

	function item_encaixes($tipo = 'aneis'){
		if ($this->raridade == 'comum') {
			$this->encaixes = 0;
		} else {
			$itens = [
				'aneis'				=> rand(0,1),
				'arma_de_duas_maos' => rand(0,3),
				'armas_de_uma_mao'	=> rand(0,3),
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