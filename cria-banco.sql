create schema empresa;

create table empresa.estado_civil
(
	id serial primary key,
	descricao varchar(30) not null
);

create table empresa.cargo
(
	id serial primary key,
	descricao varchar(35) not null
);

create table empresa.sexo
(
	id serial primary key,
	descricao varchar(20) not null
);

create table empresa.funcionario
(
	matricula     serial 		primary key,
	nome          varchar(60) 	not null,
	data_nasc     date 			not null,
	rg 		      varchar(14) 	not null,
	cic 	      varchar(14) 	not null,
	fk_cargo      integer      not null references empresa.cargo(id),
	fk_sexo   	  integer      not null references empresa.sexo(id),
	fk_est_civil  integer      not null references empresa.estado_civil(id)
);

create table empresa.telefone
(
	id	   		 serial  	primary key,
	ddd    		 char(2)  	not null,
	numero 		 char(9)	not null,
	fk_matricula integer	not null references empresa.funcionario(matricula)
);

create table empresa.dependentes
(
	id	   			serial      primary key,
	nome 			varchar(60) not null,
	dt_nasc			date		 not null,
	fk_matricula 	integer     not null references empresa.funcionario(matricula)
);

create table empresa.admissoes
(
	id	   			serial      primary key,
	dt_admissao		date		 not null,
	fk_matricula 	integer     not null references empresa.funcionario(matricula)
);

create table empresa.salario_valor_fixo
(
	id	   			serial      		primary key,
	valor			double precision 	not null,
	fk_matricula 	integer     		not null references empresa.funcionario(matricula)
);

create table empresa.salario_historico_pagamento
(
	id	   			serial      		primary key,
	ano				char(4)		 		not null,
	mes				char(2)		 		not null,
	valor			double precision 	not null,
	fk_matricula 	integer     		not null references empresa.funcionario(matricula)
);

create table empresa.endereco
(
	id	   		 serial       	primary key,
	numero		 varchar(20)  	not null,
	rua			 varchar(60)  	not null,
	complemento  varchar(60)  	not null,
	bairro       varchar(60)  	not null,
	cidade       varchar(60)  	not null,
	estado		 char(2)		not null,
	fk_matricula integer      not null references empresa.funcionario(matricula)
);

select * from empresa.estado_civil