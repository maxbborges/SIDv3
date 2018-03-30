CREATE TABLE divulgacao (
	divid serial NOT NULL,
	fbid bigint,
	linkqr character varying,
	legenda character varying,
	object_id character varying,
	datatermino date,
	datainicio date,
	CONSTRAINT divulgacao_pkey PRIMARY KEY (divid)
);

CREATE TABLE adm (
	admid serial,
	fbid bigint NOT NULL primary key,
	nome varchar,
	email varchar,
	senha varchar
);

CREATE TABLE config(
	app_id varchar PRIMARY KEY,
	app_secret varchar,
	default_graph_version varchar,
	fileUpload boolean,
	id_pagina varchar,
	tokenPagina varchar,
	destinoLocal varchar
);

CREATE TABLE turma (
	id varchar NOT NULL primary key
);

CREATE TABLE aluno(
	nome varchar,
	matricula varchar NOT NULL PRIMARY KEY,
	senha varchar NOT NULL
);

CREATE TABLE matriculado(
	matricula_aluno varchar REFERENCES aluno (matricula),
	id_turma varchar REFERENCES turma(id)
);

CREATE TABLE professor(
	matricula varchar NOT NULL PRIMARY KEY
	nome varchar,
	senha varchar,
);

CREATE TABLE menssagem(
	id_menssagem serial,
	id_professor varchar NOT NULL REFERENCES professor(matricula),
	id_turma varchar NOT NULL REFERENCES turma(id),
	menssagem varchar NOT NULL
);

insert into divulgacao values (0,null,'www.google.com.br','conheca o SID','fixa','2030-01-01');


insert into turma values ('turma2014');
insert into aluno values ('aluno1','1',md5('123'));
insert into matriculado values ('1','turma2014');
insert into professor values ('1','professor1',md5('123'));
insert into menssagem (id_professor,id_turma,menssagem) values ('1','turma2014','mensagem do professor1');
insert into adm (fbid,nome,email,senha) values (1371436046298678,'maxwell','maxbborges@gmail.com',md5('123'));

select * from aluno where senha = md5('123');

drop table menssagem;
drop table professor;
drop table matriculado;
drop table turma;
drop table aluno;
