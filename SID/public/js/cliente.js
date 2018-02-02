var vetorLegenda = new Array();
var vetorLegendaMarquee = new Array();
var vetorLinkQr = new Array();
var vetorImagens = new Array();
var vetorImgPerfil = new Array();
var vetorNomes  = new Array();
var vetorComentarios  = new Array();
var vetorInformacoes  = new Array();

var dadox;
var a = new Array();


var vetorObject = new Array();
// var a = new Array();
var j = 0;


var teste = new Array();
var teste1 = 1;

var contador = 0;
var contador1 = 0;

var iz =0;

$(document).ready(function(){
	listarImagens();
	// Divulgação Fixa
	vetorLegenda.push("<marquee id='marquee' behavior='scroll' direction='left' scrollamount='30'><p>Conheça mais sobre o SID acessando o código QR ao lado</p></marquee>");
	$("#linkQr").append("<img style='display: none;' class='imgQR' id='linkQr0' src='qrcode.php?link=https://dsnnunes.com.br/SID/'></img>");
	vetorLinkQr.push("linkQr0");
	$("#slide").append("<img style='display: none;' id='"+"imagem0' height='100%' width='100%' src='img/fixa.jpeg' alt='Imagem fixa' ></img>");
	vetorImagens.push("imagem0");
	$("#imgPerfilComent").append("<img id='perfil' height='100%' width='100%' src='imagem.php?divid=3' alt='Imagem Alt VALOR' ></img>");
	$("#textComent").append("<div id='comentario'>b</div>")
	$("#infoComent").append("<div id='informacoes'>c</div>")
	$("#nomeComent").append("<div id='nomes'>a</div");

	setInterval(slide, 5000);
});



function slide(){
	if(contador == vetorImagens.length){
		divulgacao(vetorImagens.length-1, 0);
		document.getElementById('perfil').remove();
		document.getElementById('comentario').remove();
		document.getElementById('informacoes').remove();
		document.getElementById('nomes').remove();
		$("#imgPerfilComent").append("<img id='perfil' height='100%' width='100%' src='' alt='Imagem Alt VALOR' ></img>");
		$("#textComent").append("<div id='comentario'></div>")
		$("#infoComent").append("<div id='informacoes'></div>")
		$("#nomeComent").append("<div id='nomes'></div");
		contador = 1;
	}else{
		divulgacao(contador - 1, contador);
		if (contador>0){
		listarImagens2(contador);
	}
		contador++;
	}


}

function divulgacao(anterior, atual){
	//retirar atuais.
	$('#divLegenda').empty();

	$("#"+vetorImagens[anterior]).css("display","none");
	$("#"+vetorLinkQr[anterior]).css("display","none");


	//colocar novas
	$('#divLegenda').append(vetorLegenda[atual]);
	$('#'+vetorImagens[atual]).css("display", "block");
	$('#'+vetorLinkQr[atual]).css("display", "block");
}

// function divulgacao2 (anterior,atual){
// 	$("#"+vetorImgPerfil[anterior]).css("display","none");
// 	$("#"+vetorComentarios[anterior]).css("display","none");
// 	$("#"+vetorNomes[anterior]).css("display","none");
// 	$("#"+vetorInformacoes[anterior]).css("display","none");
//
// 	$('#'+vetorImgPerfil[atual]).css("display","block");
// 	$('#'+vetorComentarios[atual]).css("display","block");
// 	$('#'+vetorNomes[atual]).css("display","block");
// 	$('#'+vetorInformacoes[atual]).css("display","block");
// }


function listarImagens(){
	$.ajax({
		url: "cliente.php",
		type: "POST",
		dataType: "json",
		success: function(dados){

			for (var i = 0;i < dados.length; i++) {
				var id = dados[i].divid;
				vetorLegenda.push("<marquee id='marquee' behavior='scroll' direction='left' scrollamount='30'><p>"+dados[i].legenda+"</p></marquee>");

				$("#linkQr").append("<img style='display: none;' class='imgQR' id='linkQr"+id+"' src='qrcode.php?link="+dados[i].linkqr+"'></img>");
				vetorLinkQr.push("linkQr"+id);

				$("#slide").append("<img style='display: none;' id='"+"imagem"+id+"' height='100%' width='100%' src='imagem.php?divid="+id+"' alt='Imagem Alt "+id+"' ></img>");
				vetorImagens.push("imagem"+id);

				a.push(dados[i]['object_id']);


			}
		}, error:function(dados){
			alert("Erro ao listar imagens!X");
		}
	});
}

// function listarImagens2(object_id,i){
function listarImagens2(contador){
	$.ajax({
		url:'cliente1.php?object_id='+a[contador-1],
		// url:'../module/Adm/src/Adm/Controller/RecuperarDados1.php',
		type: "POST",
		dataType: "json",
		success: function (response) {
			console.log(response);

			document.getElementById('perfil').remove();
			document.getElementById('comentario').remove();
			document.getElementById('informacoes').remove();
			document.getElementById('nomes').remove();
			$("#imgPerfilComent").append("<img id='perfil' height='100%' width='100%' src="+response['fotoPerfil']+" alt='Imagem Alt VALOR' ></img>");
			$("#textComent").append("<div id='comentario'>"+response['mensagem']+"</div>")
			$("#infoComent").append("<div id='informacoes'>"+response['datas']+"</div>")
			$("#nomeComent").append("<div id='nomes'>"+response['nome']+"</div");


				// console.log(response[j]);
			// var valor = Math.floor((Math.random()*response.length)+0);
			// 	$("#imgPerfilComent").append("<img style='display: none;' id='"+"perfil"+j+"' height='100%' width='100%' src='imagem.php?divid=3' alt='Imagem Alt "+j+"' ></img>");
			// 	vetorImgPerfil.push("perfil"+(j+1));
      //
			// 	$("#nomeComent").append("<div  style='display: none;' id='"+"nomes"+j+"'>"+response[j].nome+"</div");
			// 	vetorNomes.push("nomes"+(j+1));
      //
				// $("#textComent").append("<div style='display: none;' id='"+"comentarios"+j+"'>"+response[j].mensagem+"</div>");
				// vetorComentarios.push("comentarios"+(j+1));
      //
			// 	$("#infoComent").append("<div style='display: none;' id='"+"informacoes"+j+"'>"+response[j].datas+"</div>");
			// 	vetorInformacoes.push("informacoes"+(j+1));
			// }
			// console.log(response);

		},
		error: function () {
			alert("Erro ao listar imagens!Y");
		}
	});
}

function time()
{
	today=new Date();
	h=today.getHours();
	m=today.getMinutes();
	if(m<10){
		m="0"+m;
	}

	document.getElementById('horaP').innerHTML=h+":"+m+"h";
	setTimeout('time()',500);
}

function date()
{
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
