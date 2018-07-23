BEGIN;

--Insertar los modulos de reportes de seguimiento
insert into sistema.modulos values ('REPORTES_SEGUIMIENTO', '{"es":"Reportes de seguimiento","en":"Reports of tracing"}', '/reportes_seguimiento/reportes', null, true, 'REPORTES_MENU',4,'MENU', null);
insert into sistema.roles_modulos values ('REPORTES_SEGUIMIENTO','SUPERADMIN',true);

COMMIT;



/* 23/07/2018 Inserción de textos en la tabla de traducciones */
BEGIN;
insert into idiomas.traduccion values 
('reeval_confirmacion','insert_update','rechazado','{"es":"¿Confirme que desea continuar? No podrá regresar los cambios","en":""}')
,('reeval_succes','insert_update','rechazado','{"es":"El registro se actualizo correctamente","en":""}')
,('reeval_danger','insert_update','rechazado','{"es":"No fue posible envíar a evaluar nuevamente el trabajo de investigación. Por favor intentelo mas tarde","en":""}')
,('reeval_reevaluacion','insert_update','rechazado','{"es":"Evaluar nuevamente","en":""}')
;
COMMIT;
