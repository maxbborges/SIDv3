var posicao=0; // Define Qual publicação será exibida, a publicação zero é a publicação Fixa.
var intervaloPublicacaos=5000; // Define os intervalos entre publicações

$(document).ready(function(){
	setInterval(function(){
		$.ajax({
			url: "http://"+location.host+"/bd/",
			type: "GET",
			data: {id: posicao},
			dataType: "json",
			success: function(dados){
				// Limpa todos os campos de comentario para que seja exibido um novo comentario.
				$("#imgPerfilComent").empty();
				$("#textComent").empty();
				$("#infoComent").empty();
				$("#nomeComent").empty();
				$('#divLegenda').empty();
				$('#slide').empty();
				$('#linkQr').empty();

				// Apresenta na tela o QRCODE, a imagem e a legenda da publicação. Dados salvos no banco de dados.
				$("#linkQr").append("<img class='imgQR' id='linkQrx' src='qrcode.php?link="+dados['BD']['linkqr']+"'></img>");
				$("#slide").append("<img id='imagemx' height='100%' width='100%' src='data:image/png;base64,"+dados['imagem']+"' alt='Imagem Alt 1' ></img>");
				$('#divLegenda').append("<marquee id='marquee' behavior='scroll' direction='left' scrollamount='30'><p>"+dados['BD']['legenda']+"</p></marquee>");

				// Apresenta informaçoes como: Texto, foto de perfil, nome e data das publicaçoes.
				// Caso não seja encontrado nenhum comentario ele apresenta o else.
				if(dados['comentario']!=null){
					// Recupera a data e hora da publicação que foi armazenada no Array dados.
					var data = new Date(dados['comentario']['datas']).toLocaleDateString();
					var hora = new Date(dados['comentario']['datas']).toLocaleTimeString();

					//Recupera Imagem, comentario, nome e informaçoes da publicação que foi armazenada no Array dados.
					$("#imgPerfilComent").append("<img id='perfil' height='100%' width='100%' src="+dados['comentario']['fotoPerfil']+" alt='Imagem Alt VALOR' ></img>");
					$("#nomeComent").append("<div id='nomes'>"+dados['comentario']['nome']+"</div");
					$("#textComent").append("<div>"+dados['comentario']['mensagem']+"</div>");
					$("#infoComent").append("<br><div>Postado em: "+data+" as "+hora+"</div>");
				} else {
					if (posicao==0){
						$("#nomeComent").append("<br><div>Este é o SID</div");
					} else {
						$("#nomeComent").append("<br><div>Seja o primeiro a comentar nessa postagem!</div");
					}
				}

				// Incrementa na posição para exibir a proxima publicação.
				posicao++;

				// Se o total de publicações inseridas no banco for atigida, o numero de posição é zerado, exibindo a publicação inicial.
				if(posicao==dados['quantidade']){
					posicao=0;
				}
			}, error:function(dados){
				alert("Erro! \nCodigo de erro: "+response.status);
			}
		});
	},intervaloPublicacaos);
});

function time(){
	today=new Date();
	h=today.getHours();
	m=today.getMinutes();
	if(m<10){
		m="0"+m;
	}

	document.getElementById('horaP').innerHTML=h+":"+m+"h";
	setTimeout('time()',500);
}

function date(){
	today=new Date();
	dia= today.getDate();
	mes= today.getMonth();;
	ano= today.getFullYear();

	if(mes=='0'){
		mes="Janeiro";
	}else if(mes=='1'){
		mes="Fevereiro";
	}else if(mes=='2'){
		mes="Março";
	}else if(mes=='3'){
		mes="Abril";
	}else if(mes=='4'){
		mes="Maio";
	}else if(mes=='5'){
		mes="Junho";
	}else if(mes=='6'){
		mes="Julho";
	}else if(mes=='7'){
		mes="Agosto";
	}else if(mes=='8'){
		mes="Setembro";
	}else if(mes=='9'){
		mes="Outubro";
	}else if(mes=='10'){
		mes="Novembro";
	}else if(mes=='11'){
		mes="Dezembro";
	}

	document.getElementById('dataP').innerHTML=dia+" de "+mes+" de "+ano;
}
