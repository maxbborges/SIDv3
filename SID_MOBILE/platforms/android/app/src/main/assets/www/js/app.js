var matricula;
var posicao = 0;
var intervaloRepeticao = 5000;
var repeticoes = 2; //Definie quantas vezes as publicaçoes irao repetir até atualizar
var contadorRepeticoes = 0;
var url;


// Dom7
var $$ = Dom7;

// Framework7 App main instance
var app = new Framework7({
  root: '#app', // App root element
  id: 'io.framework7.testapp', // App bundle ID
  name: 'Framework7', // App name
  theme: 'auto', // Automatic theme detection
  // App root data
  data: function () {
    return {
      user: {
        firstName: 'John',
        lastName: 'Doe',
      },
    };
  },
  // App root methods
  methods: {
    helloWorld: function () {
      app.dialog.alert('Hello World!');
    },
  },
  // App routes
  routes: routes,
});

// Init/Create main view
var mainView = app.views.create('.view-main', {
  url: '/'
});



function trocaPublicacao(dados) {
  
  const intervalo = setInterval(function () {
    app.preloader.hide();
    if (contadorRepeticoes == dados.length * repeticoes) {
      contadorRepeticoes = 0;
      atualizar();
      clearInterval(intervalo);
    }
    contadorRepeticoes++;
    $$("#imgDivulgacao").remove();
    $$("#legendaDivulgacao").remove();
    $$("#qrCodeDivulgacao").remove();
    $$("#imgDivulgacaoPerfil").remove();
    $$("#nomeDivulgacao").remove();
    $$("#comentarioDivulgacao").remove();

    $$("#img").append("<img id='imgDivulgacao' src='data:image/png;base64," + dados[posicao]['imagem'] + "' width='100%' alt='Imagem divulgacao' ></img>");
    $$("#legenda").append("<div id='legendaDivulgacao'>" + dados[posicao]['bd']['legenda'] + "</div>");
    // $$("#qrcode").append("<div id='qrCodeDivulgacao'><a href=" + dados[posicao]['bd']['linkqr'] + ">Acesse a Publicação!</a></div>");
    url = dados[posicao]['bd']['linkqr'];
    $$("#qrcode").append("<button class'col button' id='qrCodeDivulgacao'>bbb</button>");
    if (dados[posicao]['comentarios'] != null) {
      var randon = Math.floor(Math.random() * (dados[posicao]['comentarios']).length);
      $$("#imgPerfil").append("<img id='imgDivulgacaoPerfil' src='" + dados[posicao]['comentarios'][randon]['urlFoto'] + "' width='30%' alt='Imagem divulgacao' ></img>");
      $$("#nome").append("<div id='nomeDivulgacao'>" + dados[posicao]['comentarios'][randon]['from']['name'] + "</div>");
      $$("#comentario").append("<div id='comentarioDivulgacao'>" + dados[posicao]['comentarios'][randon]['message'] + "</div>");
    } else {
      if (posicao == 0) {
        $$("#comentario").append("<div id='comentarioDivulgacao'>Este é o SID</div>");
      } else {
        $$("#comentario").append("<div id='comentarioDivulgacao'>Seja o primeiro a comentar nessa publicação!</div>");
      }
    }
    posicao++;
    if (posicao == dados.length) {
      posicao = 0;
    }
  }, intervaloRepeticao);
}

function atualizar() {
  app.request.json('http://200.130.152.84:6670/bd', function (dados) {
    console.log("nova");
    trocaPublicacao(dados);
  }, function (xhr, status) {
    console.log(xhr);
    console.log(status);
  });
}

$$(document).on('deviceready', function () {
  app.preloader.show();
  atualizar();
  window.open = cordova.InAppBrowser.open;
});

app.on('pageInit', function (page) {
  if (page.name === 'professor') {
    app.request.json('http://200.130.152.84:6670/mobile/turmas/', function (data) {
      $$('#turmas').append('<select id="select_turmas"><option>Seleciona a Turma</option></select>');
      for (var i = 0; i < data.length; i++) {
        app.dialog.close();
        $$('#matricula_professor').val(matricula);
        $$('#select_turmas').append('<option>' + data[i]['id'] + '</option>');
      }
    });
    $$('#enviar').on('click', function () {
      if ($$("#select_turmas").val() != "Seleciona a Turma") {
        if ($$("#mensagem").val() != "") {
          app.request.post('http://200.130.152.84:6670/mobile/menssagens/',
            { matricula: matricula, id: $$("#select_turmas").val(), menssagem: $$("#mensagem").val() },
            function (data) {
              app.dialog.alert("Inserido com sucesso!");
              $$("#mensagem").val("");
            });
        } else {
          app.dialog.alert("Digite uma menssagem!");
        }
      } else {
        app.dialog.alert("Selecione uma turma!");
      }
    });
  } else if (page.name === 'aluno') {
    app.request.json('http://200.130.152.84:6670/mobile', function (data) {
      for (var i = 0; i < data.length; i++) {
        $$("#lista").append(
          "<div class='card'><div class='card-header'>Professor: "
          + data[i]['nome_professor'] +
          "<br/>Turma: "
          + data[i]['id_turma'] +
          "</div><div class='card-content card-content-padding'> <b>Menssagem</b><br/>"
          + data[i]['menssagem'] + "<br></div></div>"
        );
      }
      app.dialog.close();
    });
  }
});

$$('.open-login').on('click', function () {
  app.dialog.login('Digite sua matricula e senha: ', function (username, password) {
    app.request.post('http://200.130.152.84:6670/mobile/login/', { matricula: username, senha: password }, function (data) {
      if (data == '"professor"') {
        app.dialog.progress();
        matricula = username;
        mainView.router.navigate('/professor/');
      } else if (data == '"aluno"') {
        app.dialog.progress();
        mainView.router.navigate('/aluno/');
      } else {

      }
    }, function (xhr, status) { console.log(xhr); console.log(status); });
  });
});

$$('.open-preloader-indicator').on('click', function () {
  app.preloader.show();
  setTimeout(function () {
    app.preloader.hide();
  }, 3000);
});


$$('#acessar').on('click', function () {
  var ref = cordova.InAppBrowser.open(url, '_blank', 'location=yes');
});