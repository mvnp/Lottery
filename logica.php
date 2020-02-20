<?php
session_start();

/**
 * Função que coloca dois algarismos nas dezenas
 * @param [type] $num [description]
 * @return [type] [description]
 */
function tratar(array $array)
{
	$sequence = [];
	foreach ($array as $key => $value) {
		$value = str_pad($value, 2, 0, STR_PAD_LEFT);
		$sequence[] = $value;
	}
	return $sequence;
}

/**
 * Função que gera as dezenas com a quantidade escolhida
 * @param [type] $num [description]
 * @return [type] [description]
 */
function random_unique_select($num, array $possible_values, $excludes, $always)
{
	$sizeof = count($possible_values);

    if ($num > $sizeof) {
        throw new InvalidArgumentException('$num is too large');
    }

    $selected = [];
    for ($i = 0; $i < $num; ++$i) {

        // Grab a random int [0, ... N - 1]
        $r = random_int(0, $sizeof - 1);

        // Copy the selected value into $selected
		$selected[]	= $possible_values[$r];	

        // Remove os números repetidos
        unset($possible_values[$r]);

        // N has grown smaller by 1
        --$sizeof;

	    // Indexa os valores em ordem crescente numérica de índice
	    $possible_values = array_values($possible_values);	        
    }

    // Caso manter e excluir não tenham sido passados
    if(count($always) == 0 && count($excludes) == 0) {
    	array_slice($selected, 0, $qty);
    	sort($selected);
    	return $selected;
    }

	if(count($always) > 0)
		$selected = array_slice(array_unique(array_merge($selected, $always)), 0, $qty);

    if(count($excludes) > 0)
    	$selected = array_slice(array_diff($selected, $excludes), 0, $qty);

    sort($selected);
    return $selected;
}

/**
 * Essa parte controla tudo que recebe do formulário 
 * e tudo que é enviado para as funções do PHP e faz
 * sessão das variáveis enviadas
 * @param  [type] $num [description]
 * @return [type] [description]
 */
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$data = $_POST;
	$_SESSION['inc'] = $data['include'];
	$_SESSION['exc'] = $data['exclude'];
	$_SESSION['qty'] = $data['qty'];

	$qty = (int)$data['qty'];
	$possible_values = range(1, 25);
	$always = $data['include'];
	$excludes = $data['exclude'];
	$times = 250;

	$lottery = [];
	$ra = 0;
	for ($i = 0; $i < $times; $i++) {
		$grupo = "";
		$lottery[] = random_unique_select($qty, $possible_values, $excludes, $always);
		foreach ($lottery as $loterias => $numeros) {
			if(count($numeros) === $qty) {
				$ra++;
				$grupo .= "<strong>" . str_pad($loterias, 3, 0, STR_PAD_LEFT) .'</strong> => '. implode(" - ", tratar($numeros)) . "<br>";
			}
		}
	}		
}