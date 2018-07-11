BEGIN;

--Insertar los modulos de reportes de seguimiento
insert into sistema.modulos values ('REPORTES_SEGUIMIENTO', '{"es":"Reportes de seguimiento","en":"Reports of tracing"}', '/reportes_seguimiento/reportes', null, true, 'REPORTES_MENU',4,'MENU', null);
insert into sistema.roles_modulos values ('REPORTES_SEGUIMIENTO','SUPERADMIN',true);

COMMIT;
