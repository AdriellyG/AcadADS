create or replace function higienizaCPF(cpf varchar(14))
returns char(11)
as
$body$
declare
	cpfLimpo varchar(14);
begin
	return trim(replace(replace(cpf, '-', ''), '.', ''));
end
$body$
language 'plpgsql';