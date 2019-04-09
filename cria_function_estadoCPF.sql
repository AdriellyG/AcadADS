create or replace function estadoCPF(cpf varchar(14))
returns varchar
as
$body$
declare
	cpfLimpo varchar(14);
begin
	cpfLimpo := higienizaCPF(cpf);

	if validaCPF(cpfLimpo) then
		if substring(cpfLimpo from 9 for 1) = '0' then
			return 'Rio Grande do Sul';
		elsif substring(cpfLimpo from 9 for 1) = '1' then
			return 'Distrito Federal – Goiás – Mato Grosso – Mato Grosso do Sul – Tocantins';
		elsif substring(cpfLimpo from 9 for 1) = '2' then
			return 'Pará – Amazonas – Acre – Amapá – Rondônia – Roraima';
		elsif substring(cpfLimpo from 9 for 1) = '3' then
			return 'Ceará – Maranhão – Piauí';
		elsif substring(cpfLimpo from 9 for 1) = '4' then
			return 'Pernambuco – Rio Grande do Norte – Paraíba – Alagoas';
		elsif substring(cpfLimpo from 9 for 1) = '5' then
			return 'Bahia – Sergipe';
		elsif substring(cpfLimpo from 9 for 1) = '6' then
			return 'Minas Gerais';
		elsif substring(cpfLimpo from 9 for 1) = '7' then
			return 'Rio de Janeiro – Espírito Santo';
		elsif substring(cpfLimpo from 9 for 1) = '8' then
			return 'São Paulo';
		elsif substring(cpfLimpo from 9 for 1) = '9' then
			return 'Paraná – Santa Catarina';
		else
			return 'Erro';
		end if;
	end if;
end
$body$
language 'plpgsql';

select * from estadoCPF('047.870.727-49');