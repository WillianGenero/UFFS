-- Universidade Federal da Fronteira Sul
-- Willian Bordignon Genero
-- Banco de Dados II

drop table PageRevision;
drop table PageAudit;
create table PageRevision(
  name varchar(50),
  data date,
  author varchar(50),
  text text
);
create table PageAudit(
  name varchar(50),
  data date,
  author varchar(50),
  text text,
  dif_len int,
  usuario varchar(50),
  dataAlt date,
  op char
);

create or replace function auditoria()
returns trigger as $$
begin
  IF (tg_op = 'INSERT') then
    insert into PageAudit values (new.*, length(new.text), current_user, now(), 'I');
      return new;
  elsif (tg_op = 'UPDATE') then
    insert into PageAudit values (old.*, abs(length(old.text)-length(new.text)), current_user, now(), 'U');
      return new;
  elsif (tg_op = 'DELETE') then
    insert into PageAudit values (old.*, abs(length(old.text)-0), current_user, now(), 'D');
      return old;
  END IF;
  return null;
end;
$$language plpgsql;
CREATE TRIGGER t_audit AFTER INSERT OR UPDATE OR DELETE ON PageRevision FOR EACH ROW EXECUTE PROCEDURE auditoria();

--Abaixo algumas opções para utilizar
insert into PageRevision values ('Fussão Nuclear', now(), 'Jorge Alberto', 'A fussão nuclear irá revolucionar o mundo energético!');
insert into PageRevision values ('Morte de Pássaros', now(), 'Rosana Vieira', 'O tamanho do habitat natural dos pássaros está diminuindo e consigo seu número!');
delete from PageRevision where name = 'Morte de Pássaros';
update PageRevision set text = 'O fuscão nuclear irá revolucionar o mundo automobilístico';
