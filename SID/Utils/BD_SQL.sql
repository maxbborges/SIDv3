CREATE TABLE divulgacao (
	divid serial NOT NULL,
	fbid bigint,
	linkqr character varying,
	prioridade character varying,
	legenda character varying,
	object_id character varying,
	datatermino date,
	CONSTRAINT divulgacao_pkey PRIMARY KEY (divid)
);

CREATE TABLE adm (
	admid serial primary key,
	nome varchar,
	email varchar,
	senha varchar
);

CREATE TABLE turma (
	id varchar NOT NULL primary key
);

CREATE TABLE aluno(
	nome varchar,
	matricula varchar NOT NULL PRIMARY KEY
);

CREATE TABLE matriculado(
	matricula_aluno varchar REFERENCES aluno (matricula),
	id_turma varchar REFERENCES turma(id)
);

CREATE TABLE professor(
	nome varchar,
	matricula varchar NOT NULL PRIMARY KEY
);

CREATE TABLE menssagem(
	id_professor varchar REFERENCES professor(matricula),
	id_turma varchar REFERENCES turma(id),
	menssagem varchar NOT NULL PRIMARY KEY
);

insert into divulgacao values (0,null,'www.google.com.br',null,'conheca o SID','fixa','2030-01-01');


insert into turma values ('turma2014');
insert into aluno values ('aluno1','1');
insert into matriculado values ('1','turma2014');
insert into professor values ('professor1','1');
insert into menssagem values ('1','turma2014','mensagem do professor1');
