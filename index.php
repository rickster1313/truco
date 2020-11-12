<!DOCTYPE html>
<html>
<head>
	<title>Truco</title>
	<style type="text/css">
		body{
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
		}
		#mesa{
			display: flex;
			flex-direction: column;
			width: 600px;
			height: 600px;
			background-color: orange;
		}
		.player{
			border:1px solid black;
			width: 199px;
			height: 199px;
			display: flex;
			flex-direction: column;
			align-items: center;

		}
		.meio{
			display: flex;
			flex-direction: row;
			justify-content: space-between;
		}
		.nome{
			font-size: 15px;
			font-weight: bolder;
		}
		.cartas{
			display: flex;
			flex-direction: row;
			justify-content: space-around;
		}
		#start{
			position: absolute;
			left:100px;
			top: 100px;

		}
		#menu{
			position: absolute;
			left:100px;
			top: 150px;

		}
		.card{
			font-size: 10px;
			font-weight: bolder;
			text-transform: uppercase;
		}
	</style>
</head>
<body>
	<button id="start">Dar cartas</button>
	<div id="menu"></div>
	<div id="mesa">
		<div class="player" style="align-self: center;">
			<label class="nome">jogador 1</label>
			<div class="cartas" id="cartas01">
				
			</div>
		</div>
		<div class="meio">
			<div class="player">
				<label class="nome">jogador 2</label>
				<div class="cartas" id="cartas02">
					
				</div>
			</div>
			<div class="player">
				<label class="nome">jogador 4</label>
				<div class="cartas" id="cartas03">
					
				</div>
			</div>
		</div>
			
		<div class="player" style="align-self: center;">
			<label class="nome">jogador 3</label>
			<div class="cartas" id="cartas04">
				
			</div>
		</div>


	</div>
	<div id="resp"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#start").bind("click",function(){
				$.ajax({
					type:'POST',
					dataType:"json",
					url:'script.php',
					data:"request=novarodada",
					success:function(json){
						var carta = json.nomeCarta;
						var nipe = json.nomeNipe;
						var players = [json.jogador1,json.jogador2,json.jogador3,json.jogador4];
						var vira = json.cartaVirada;
						console.log(json);
						$("#menu").html("Vira:"+carta[vira.numlet]+"-"+nipe[vira.nipe]);
						for (var p = 1; p <= 4; p++) {
							for( var c = 0; c <=2; c++){
								if(c===0){
									$("#cartas0"+p).html("<button class='card' id='p"+p+":"+c+"' >"+carta[players[p-1][c].numlet]+"-"+nipe[players[p-1][c].nipe]+"</button>")
								}else{
									$("#cartas0"+p).append("<button class='card' id='p"+p+":"+c+"' >"+carta[players[p-1][c].numlet]+"-"+nipe[players[p-1][c].nipe]+"</button>");
								}
							}
							
						}
						

					},
					error:function(){
						console.log("error no ajax");
					}
				});
			});
		});
	</script>
</body>
</html>