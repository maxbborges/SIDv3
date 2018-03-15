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

insert into divulgacao values (0,null,'www.google.com.br',null,'conheca o SID','fixa','2030-01-01');


insert into turma values ('turma2014');
insert into aluno values ('aluno1','1',md5('123'));
insert into matriculado values ('1','turma2014');
insert into professor values ('1','professor1',md5('123'));
insert into menssagem (id_professor,id_turma,menssagem) values ('1','turma2014','mensagem do professor1');

select * from aluno where senha = md5('123');

drop table menssagem;
drop table professor;
drop table matriculado;
drop table turma;
drop table aluno;
