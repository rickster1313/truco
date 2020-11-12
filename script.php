<?php 
if(isset($_POST["request"])){
	if($_POST["request"]=="novarodada"){
		$valorCarta = [0,1,2,3,4,5,6,7,8,9];
		$nomeCarta = ["4","5","6","7","Q","J","K","A","2","3"];
		$valorNipe = [0,1,2,3];
		$nomeNipe = ["ouros","espadas","copas","paus"];
		$totalCartas = array();
		for ($x=0; $x < count($valorCarta); $x++) { 
			for ($y=0; $y < count($valorNipe) ; $y++) { 
				array_push($totalCartas, array("numlet" => $x, "nipe" => $y)); 
			}
		}
		shuffle($totalCartas);
		
		$jogardor1=array($totalCartas[0],$totalCartas[4],$totalCartas[8]);
		$jogardor2=array($totalCartas[1],$totalCartas[5],$totalCartas[9]);
		$jogardor3=array($totalCartas[2],$totalCartas[6],$totalCartas[10]);
		$jogardor4=array($totalCartas[3],$totalCartas[7],$totalCartas[11]);
		$cartaVirada = $totalCartas[12];
		$resposta = array(
			'jogador1' => $jogardor1, 
			'jogador2' => $jogardor2, 
			'jogador3' => $jogardor3, 
			'jogador4' => $jogardor4,
			'nomeCarta' => $nomeCarta,
			'nomeNipe' => $nomeNipe,
			'cartaVirada' =>$cartaVirada
		);
		echo json_encode($resposta);
		//print_r($totalCartas);
		/*
		foreach ($totalCartas as $key => $value) {
			foreach ($value as $chave => $valor) {
				echo $nomeCarta[$chave]." - ".$nomeNipe[$valor]."<br>";
			}
		}*/
	}
}else{
	echo "erro na request";
}

?>