<?php

class Pedras_Model{

	private $nivel;
	private $preco;
	private $bonus1;
	private $bonus2;
	private $raridade;
	private $nome;

	private $dano;
	private $experiencia;
	private $mana;
	private $vida;
	private $defesa;
	private $esquiva;
	private $critico_induzido;
	private $dinheiro;
	private $drop_level;
	private $habilidades;

	function _get($nome){
		return $this->$nome;
	}

	function _set($atributo, $valor){
		$this->$atributo = $valor;
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

	function pedra_raridade(){
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

	function pedra_preco(){
		$pedras = [
			'rubi'			=> rand(10000, 15000),
			'esmeralda'		=> rand(9000, 14000),
			'safira'		=> rand(7000, 13000),
			'topazio'		=> rand(6000, 11000),
			'ametista'		=> rand(6000, 11000),
			'diamante'		=> rand(5000, 10000),
			'opala'			=> rand(30000, 50000)
			];

		if (isset($pedras[$this->nome])) {
			$preco = 0;
			switch ($this->nome) {
				case 'rubi': 
					if (isset($this->dano) and isset($this->experiencia)) {
						$preco = (($pedras[$this->nome] * 2) * $this->nivel) * $this->_indice($this->raridade);
					} else {
						$preco = ($pedras[$this->nome] * $this->nivel) * $this->_indice($this->raridade);
					}
				break;

				case 'esmeralda':
					if (isset($this->esquiva) and isset($this->critico_induzido)) {
						$preco = (($pedras[$this->nome] * 2) * $this->nivel) * $this->_indice($this->raridade);
					} else {
						$preco = ($pedras[$this->nome] * $this->nivel) * $this->_indice($this->raridade);
					}
				break;

				case 'safira':
					if (isset($this->vida) and isset($this->defesa)) {
						$preco = (($pedras[$this->nome] * 2) * $this->nivel) * $this->_indice($this->raridade);
					} else {
						$preco = ($pedras[$this->nome] * $this->nivel) * $this->_indice($this->raridade);
					}
				break;

				case 'topazio':
					if (isset($this->dano) and isset($this->mana)) {
						$preco = (($pedras[$this->nome] * 2) * $this->nivel) * $this->_indice($this->raridade);
					} else {
						$preco = ($pedras[$this->nome] * $this->nivel) * $this->_indice($this->raridade);
					}
				break;

				case 'ametista':
					if (isset($this->dano) and isset($this->mana)) {
						$preco = (($pedras[$this->nome] * 2) * $this->nivel) * $this->_indice($this->raridade);
					} else {
						$preco = ($pedras[$this->nome] * $this->nivel) * $this->_indice($this->raridade);
					}
				break;

				case 'diamante':
					if (isset($this->dinheiro) and isset($this->drop_level)) {
						$preco = (($pedras[$this->nome] * 2) * $this->nivel) * $this->_indice($this->raridade);
					} else {
						$preco = ($pedras[$this->nome] * $this->nivel) * $this->_indice($this->raridade);
					}
				break;

				case 'opala':
						$preco = (($pedras[$this->nome] * 2) * $this->nivel) * $this->_indice($this->raridade);
				break;
			}

			$this->preco = $preco;
		} else {
			die('Nome de pedra desconhecido.');
		}
	}

	function pedra_dano(){
		$dano_final = 0;
		switch ($this->raridade) {
			case 'único': $dano_final 		= rand(1000,1500);
			break;

			case 'lendário': $dano_final 	= rand(600,1000);
			break;

			case 'raro': $dano_final 		= rand(300,600);
			break;

			case 'mágico': $dano_final 		= rand(100,300);
			break;

			case 'comum': $dano_final 		= rand(1,100);
			break;
		}	

		$this->dano = $dano_final;
	}

	function pedra_experiencia(){
		$xp_final = 0;
		switch ($this->raridade) {
			case 'único': $xp_final 		= rand(81,100);
			break;

			case 'lendário': $xp_final 		= rand(61,80);
			break;

			case 'raro': $xp_final 			= rand(41,60);
			break;

			case 'mágico': $xp_final 		= rand(21,40);
			break;

			case 'comum': $xp_final 		= rand(1,20);
			break;
		}	

		$this->experiencia = $xp_final;
	}

	function pedra_mana(){
		$mana_final = 0;
		switch ($this->raridade) {
			case 'único': $mana_final 		= rand(61,90);
			break;

			case 'lendário': $mana_final 	= rand(41,60);
			break;

			case 'raro': $mana_final 		= rand(21,40);
			break;

			case 'mágico': $mana_final 		= rand(11,20);
			break;

			case 'comum': $mana_final 		= rand(1,10);
			break;
		}	

		$this->mana = $mana_final;
	}

	function pedra_defesa(){
		$defesa_final = 0;
		switch ($this->raridade) {
			case 'único': $defesa_final 	= rand(182,264);
			break;

			case 'lendário': $defesa_final 	= rand(115,182);
			break;

			case 'raro': $defesa_final 		= rand(62,115);
			break;

			case 'mágico': $defesa_final 	= rand(24,62);
			break;

			case 'comum': $defesa_final 	= rand(1,24);
			break;
		}	

		$this->defesa = $defesa_final;
	}

	function pedra_vida(){
		$vida_final = 0;
		switch ($this->raridade) {
			case 'único': $vida_final 		= rand(2000,3000);
			break;

			case 'lendário': $vida_final 	= rand(1200,2000);
			break;

			case 'raro': $vida_final 		= rand(600,1200);
			break;

			case 'mágico': $vida_final 		= rand(200,600);
			break;

			case 'comum': $vida_final 		= rand(1,200);
			break;
		}	

		$this->vida = $vida_final;
	}

	function pedra_esquiva(){
		$esquiva_final = 0;
		switch ($this->raridade) {
			case 'único': $esquiva_final 		= rand(13,18);
			break;

			case 'lendário': $esquiva_final 	= rand(9,12);
			break;

			case 'raro': $esquiva_final 		= rand(5,8);
			break;

			case 'mágico': $esquiva_final 		= rand(3,4);
			break;

			case 'comum': $esquiva_final 		= rand(1,2);
			break;
		}	

		$this->esquiva = $esquiva_final;
	}

	function pedra_critico_induzido(){
		$critico_induzido_final = 0;
		switch ($this->raridade) {
			case 'único': $critico_induzido_final 		= rand(20,25);
			break;

			case 'lendário': $critico_induzido_final 	= rand(15,20);
			break;

			case 'raro': $critico_induzido_final 		= rand(10,15);
			break;

			case 'mágico': $critico_induzido_final 		= rand(5,10);
			break;

			case 'comum': $critico_induzido_final 		= rand(1,5);
			break;
		}	

		$this->critico_induzido = $critico_induzido_final;
	}

	function pedra_dinheiro(){
		$dinheiro_final = 0;
		switch ($this->raridade) {
			case 'único': $dinheiro_final 		= rand(80,100);
			break;

			case 'lendário': $dinheiro_final 	= rand(60,80);
			break;

			case 'raro': $dinheiro_final 		= rand(40,60);
			break;

			case 'mágico': $dinheiro_final 		= rand(20,40);
			break;

			case 'comum': $dinheiro_final 		= rand(1,20);
			break;
		}	

		$this->dinheiro = $dinheiro_final;
	}

	function pedra_drop_level(){
		$drop_level_final = 0;
		switch ($this->raridade) {
			case 'único': $drop_level_final 		= rand(20,25);
			break;

			case 'lendário': $drop_level_final 		= rand(15,20);
			break;

			case 'raro': $drop_level_final 			= rand(10,15);
			break;

			case 'mágico': $drop_level_final 		= rand(5,10);
			break;

			case 'comum': $drop_level_final 		= rand(1,5);
			break;
		}	

		$this->drop_level = $drop_level_final;
	}

	function pedra_show_dano(){
		return "Aumenta +{$this->dano} de dano";
	}

	function pedra_show_experiencia(){
		return "Você recebe {$this->experiencia}% a mais de experiência da aventura.";
	}

	function pedra_show_mana(){
		return "Aumenta +{$this->mana} de mana.";
	}

	function pedra_show_defesa(){
		return "Aumenta +{$this->defesa} de defesa.";
	}

	function pedra_show_vida(){
		return "Aumenta +{$this->vida} de vida.";
	}

	function pedra_show_esquiva(){
		return "Aumenta +{$this->esquiva}% de esquiva.";
	}

	function pedra_show_critico_induzido(){
		return "Aumenta +{$this->critico_induzido}% de crítico induzido.";
	}

	function pedra_show_dinheiro(){
		return "Você recebe {$this->dinheiro}% a mais sobre qualquer dinheiro ganho.";
	}

	function pedra_show_drop_level(){
		return "Seu nível aumeta em +{$this->drop_level} para uso de drop level.";
	}

	function pedra_show($col_md = 'col-md-3'){
		$pedras_lista = [
			'rubi' 		=> ['pedra_show_dano','pedra_show_experiencia'],
			'esmeralda' => ['pedra_show_esquiva','pedra_show_critico_induzido'],
			'safira' 	=> ['pedra_show_defesa','pedra_show_vida'],
			'topazio' 	=> ['pedra_show_dano','pedra_show_mana'],
			'ametista' 	=> ['pedra_show_dano','pedra_show_mana'],
			'diamante' 	=> ['pedra_show_dinheiro','pedra_show_drop_level'],
			'opala'		=> ['pedra_show_dano','pedra_show_experiencia','pedra_show_esquiva','pedra_show_critico_induzido','pedra_show_defesa','pedra_show_vida','pedra_show_mana','pedra_show_dinheiro','pedra_show_drop_level']
			];

		$pedra_preco = number_format(intval($this->preco), 2, ',', '.').' gold';
		$pedra_preco_venda = number_format(intval($this->preco/2), 2, ',', '.').' gold';

		echo '<div class="'.$col_md.'">';
		echo '<img class="img-responsive pedras" src="'.URL_BASE.'app/assets/img/'.$this->nome.'.png">';
		echo '<div class="pedra-titulo">'.ucfirst($this->nome).'</div>';
		echo '<b>Lv</b>: '.$this->nivel.'<br>';
		echo '<b>Compra</b>: '.$pedra_preco.'<br>';
		echo '<b>Venda</b>: '.$pedra_preco_venda.'<br>';
		foreach ($pedras_lista as $pedra_key => $pedra_value) {
			if ($pedra_key == $this->nome) {
				foreach ($pedra_value as $key2 => $value2) {
					$atributo = substr($value2, 11);
					$atributo_nome = $this->_get("{$atributo}");
					if (isset($atributo_nome)) {
						$this->habilidades[] = $this->$value2();
						echo $this->$value2().'<br>';
					}
				}
			}
		}
		echo '</div>';
	}
}