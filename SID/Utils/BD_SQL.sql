CREATE TABLE divulgacao (
	divid serial NOT NULL,
	fbid bigint,
	linkqr character varying,
	prioridade character varying,
	legenda character varying,
	datatermino date,
	CONSTRAINT divulgacao_pkey PRIMARY KEY (divid)
);

CREATE TABLE adm (
	admid serial primary key,
	nome varchar,
	email varchar,
	senha varchar
);
