create or replace function validaCPF(cpf varchar(14))
returns integer
as
$body$
declare
	soma integer;
	cont integer;
	cpfLimpo char(11);
begin	
	soma := 0;
	cont := 1;
	
	if length(higienizaCPF(cpf)) = 11 then
		cpfLimpo := higienizaCPF(cpf);

		if length(cpfLimpo) = 11 then
			while cont < 12 loop
				soma := soma + substring(cpfLimpo from cont for 1)::integer;
			
				cont := cont + 1;
			end loop;
		end if;
	end if;

	if substring(soma::varchar(1) from 1 for 1) = substring(soma::varchar from 2 for 1) 
		and 
	   length(soma::varchar) = 2 then
		return 1;
	else
		return 0;
	end if;
end
$body$
language 'plpgsql';

select validaCPF(cast('476.562.848-50' as varchar(14)));