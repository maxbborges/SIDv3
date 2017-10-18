var vetorLegenda = new Array();
var vetorLegendaMarquee = new Array();
var vetorLinkQr = new Array();
var vetorImagens = new Array();

var contador = 0;

$(document).ready(function(){
	listarImagens();

	// Divulgação Fixa 
	vetorLegenda.push("<marquee id='marquee' behavior='scroll' direction='left' scrollamount='30'><p>Conheça mais sobre o SID acessando o código QR ao lado</p></marquee>");
	$("#linkQr").append("<img style='display: none;' class='imgQR' id='linkQr0' src='qrcode.php?link=https://dsnnunes.com.br/SID/'></img>");
	vetorLinkQr.push("linkQr0");
	$("#slide").append("<img style='display: none;' id='"+"imagem0' height='100%' width='100%' src='img/fixa.jpeg' alt='Imagem fixa' ></img>");
	vetorImagens.push("imagem0");

	setInterval(slide, 65000);
});

function slide(){
	if(contador == vetorImagens.length){
		divulgacao(vetorImagens.length-1, 0);
		contador = 1;
	}else{
		divulgacao(contador - 1, contador);
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

			}
		}, error:function(dados){
			alert("Erro ao listar imagens!");
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