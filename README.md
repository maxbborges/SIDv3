# ORGANIZACAO DO DOCUMENTO #

* tcc/
|_ SID/ # VERSAO WEB DO SID
   |_ Utils/
      |_ BD_SQL.sql # ARQUIVO PARA CONFIGURACAO DO BANCO DE DADOS
      |_ Dados do Facebook # DADOS DE ACESSO AO FACEBOOK
      |_
   |_ config/ # CONFIGURACOES DO PHP
      |_ autoload/
	 |_ .gitignore
	 |_ global.php
      |_ application.config.php
   |_ module/
      |_ Adm/
      |_ Api/
      |_ Cliente/
   |_ public/
      |_ css/
      |_ fonts/
      |_ imagens/
      |_ img/
      |_ js/
      |_ .htaccess
      |_ Connection.php
      |_ index.php
      |_ qrcode.php
   |_ vendor/ # PASTA QUE ESTA COM AS DEPENDENCIAS DE FUNCIONAMENTO
      |_ phpqrcode/
   |_ .gitignore
   |_ Vagrantfile
   |_ composer.json
   |_ composer.phar
   |_ init_autoloader.php
   |_ zf
|_ SID_MOBILE/ # VERSÃO MOBILE DO SID
|_ apresentacao/ # APRESENTACAO EM LATEX
|_ documentacao/ # DOCUMENTACAO DO SISTEMA 
|_ TCC_PCC/ # PRIMEIRA VERSAO DO TEXTO, ENTREGUE PARA O PCC
|_ TCC_FINAL/ # VERSAO FINAL DO TEXTO, ENTREGUE PARA DEFESA
|_ TCC_FINAL_CORRECOES/ # VERSAO FINAL DO TEXTO, ENTREGUE APOS DEFESA
|_ Instalacao-com-docker # TUTORIAL DE COMO RODAR O SID NO DOCKER
|_ README.txt
