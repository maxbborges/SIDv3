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

insert into divulgacao values (0,null,'www.google.com.br',null,'conheca o SID','fixa','2030-01-01');
