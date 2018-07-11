BEGIN;
/*Autor Claudia, vista para generar reporte de calidad por delegación*/
create or replace view foro.trabajos_registrados_imss as
select ti.folio, iu.matricula, del.clave_delegacional, del.nombre, d.folio_dictamen, d.promedio,
hiu.clave_departamental, u.clave_unidad, u.es_umae, u.nivel_atencion, r.id_region, r.nombre region
, cp.id_convocatoria, cp.nombre as convocatoria, cp.activo, cp.registro, cp.revision, cp.anio
from foro.trabajo_investigacion ti
left join foro.dictamen d on ti.folio = d.folio
inner join foro.autor a on ti.folio = a.folio_investigacion
inner join sistema.informacion_usuario iu on a.id_informacion_usuario = iu.id_informacion_usuario
inner join sistema.historico_informacion_usuario hiu on iu.id_informacion_usuario = hiu.id_informacion_usuario and hiu.actual = true
inner join catalogo.departamento dep on hiu.clave_departamental = dep.clave_departamental
inner join catalogo.unidad u on dep.clave_unidad = u.clave_unidad
inner join catalogo.delegaciones del on del.id_delegacion = u.id_delegacion
left join catalogo.regiones r on r.id_region = del.id_region
inner join foro.convocatoria cp on  cp.id_convocatoria = ti.id_convocatoria
where a.registro = true and iu.es_imss = true;


/*Registro de textos de idioma*/
insert into idiomas.grupo (clave_grupo, nombre) values
('reportes', 'Reportes'), ('reportes_calidad', 'Reportes de calidad'), ('reportes_imss', 'Reportes imss'), ('reportes_generales', 'Reportes generales');

insert into idiomas.tipo values ('subtitle','Subtitulo');

insert into idiomas.traduccion values
('calidad','lbl','reportes','{"es":"Calidad","en":""}')
, ('total_trabajos','lbl','reportes','{"es":"Total de trabajos","en":""}')
;

insert into idiomas.traduccion values
('ext_inst','lbl','reportes_calidad','{"es":"Extranjeros IMSS","en":""}')
, ('ext_no_inst','lbl','reportes_calidad','{"es":"Extranjeros no IMSS","en":""}')
,('nac_inst','lbl','reportes_calidad','{"es":"Nacionales IMSS","en":""}')
,('nac_no_inst','lbl','reportes_calidad','{"es":"Nacionales no IMSS","en":""}')
,('calidad_ext_nac_ins','tab','reportes_calidad','{"es":"Calidad nacionales y extranjeros","en":""}')
,('calidad_genero','tab','reportes_calidad','{"es":"Calidad por género","en":""}')
,('total_trabajos','tab','reportes_calidad','{"es":"Total trabajos nacionales y extranjeros evaluados","en":""}')
,('medicion_x','lbl','reportes_calidad','{"es":"Cantidad de trabajos","en":""}')
,('medicion_y','lbl','reportes_calidad','{"es":"Calidad","en":""}')
,('calidad_ext_nac_ins_t','title','reportes_calidad','{"es":"Calidad nacionales y extranjeros","en":""}')
,('calidad_ext_nac_ins_st','subtitle','reportes_calidad','{"es":"Institucionales y no Institucionales","en":""}')
,('calidad_ext_nac_t','title','reportes_calidad','{"es":"Total de trabajos nacionales y extranjeros evaluados","en":""}')
,('calidad_genero_t','title','reportes_calidad','{"es":"Calidad por género","en":""}')
,('calidad_genero_st_fmo','subtitle','reportes_calidad','{"es":"Masculino, Femenino y Otro","en":""}')
;

insert into idiomas.traduccion values
('rep_sexo_F','radio','reportes','{"es":"Femenino","en":"Female"}')
,('rep_sexo_M','radio','reportes','{"es":"Masculino","en":"Male"}')
,('rep_sexo_O','radio','reportes','{"es":"Otro","en":"Another"}')
;
-- :CLAPAS textos para reportes de institucion

INSERT INTO idiomas.traduccion (clave_traduccion, clave_tipo, clave_grupo, lang) values
('tab_top','tab','reportes_imss','{"es":"Top de trabajos registrados","en":""}'),
('tab_porcentaje','tab','reportes_imss','{"es":"Porcentaje de trabajos registrados","en":""}'),
('tab_calidad','tab','reportes_imss','{"es":"Calidad de trabajos evaluados (promedio de evaluación)","en":"Calidad de trabajos evaluados (promedio de evaluación)"}'),
('titulo_top','title','reportes_imss','{"es":"Número de trabajos registrados por","en":""}'),
('titulo_porcentaje','title','reportes_imss','{"es":"Porcentaje de trabajos registrados por","en":""}'),
('titulo_calidad','title','reportes_imss','{"es":"Calidad de los trabajos evaluados por","en":""}'),
('tooltip_top','txt','reportes_imss','{"es":"Trabajos registrados:","en":""}'),
('tooltip_porcentaje','txt','reportes_imss','{"es":"Trabajos registrados:","en":""}'),
('tooltip_calidad','txt','reportes_imss','{"es":"Calificación promedio:","en":""}');

-- CLAPAS: textos para reportes de institucion

INSERT INTO idiomas.traduccion (clave_traduccion, clave_tipo, clave_grupo, lang) values
('yaxis_top','lbl','reportes_imss','{"es":"Trabajos registrados","en":""}'),
('yaxis_calidad','lbl','reportes_imss','{"es":"Promedio","en":""}'),
('nota_porcentaje_umae','nota','reportes_imss','{"es":"Las UMAE que no aparecen en la gráfica no registraron trabajos de investigación","en":""}'),
('nota_porcentaje_del','nota','reportes_imss','{"es":"Las delegaciones que no aparecen en la gráfica no registraron trabajos de investigación","en":""}');


-- AlesitaSpock
INSERT INTO idiomas.traduccion(clave_traduccion, clave_tipo, clave_grupo, lang) VALUES
('reporte_general_title', 'lbl', 'reportes_generales', '{"es":"Reportes generales","en":""}'),
('tab_t_exposiciones', 'tab', 'reportes_generales', '{"es":"Total de trabajos registrados","en":""}'),
('t_exposiciones', 'lbl', 'reportes_generales', '{"es":"Total de trabajos registrados","en":""}'),
('lbl_cartel', 'lbl', 'reportes_generales', '{"es":"Cartel","en":""}'),
('lbl_oratoria', 'lbl', 'reportes_generales', '{"es":"Oratoria","en":""}'),
('lbl_rechazados', 'lbl', 'reportes_generales', '{"es":"Rechazados","en":""}'),
('lbl_rechazados_nte', 'lbl', 'reportes_generales', '{"es":"No son temas de educación","en":""}'),
('tab_t_nac_ext', 'tab', 'reportes_generales', '{"es":"Total de trabajos de autores nacionales y extranjeros","en":""}'),
('t_nac_ext', 'lbl', 'reportes_generales', '{"es":"Total de trabajos de autores nacionales y extranjeros","en":""}'),
('lbl_nacionales', 'lbl', 'reportes_generales', '{"es":"Trabajos nacionales","en":""}'),
('lbl_extranjeros', 'lbl', 'reportes_generales', '{"es":"Trabajos extranjeros","en":""}'),
('tab_t_genero', 'tab', 'reportes_generales', '{"es":"Total de trabajos por género","en":""}'),
('lbl_femenino', 'lbl', 'reportes_generales', '{"es":"Femenino","en":""}'),
('lbl_masculino', 'lbl', 'reportes_generales', '{"es":"Masculino","en":""}'),
('lbl_otro', 'lbl', 'reportes_generales', '{"es":"Otro","en":""}'),
('actualizar_registro', 'button', 'registro_usuario', '{"es":"Actualizar","en":"Update"}'),
('lbl_departamento', 'lbl', 'registro_usuario', '{"es":"Departamento:","en":""}'),
('t_genero', 'lbl', 'reportes_generales', '{"es":"Total de trabajos por género","en":""}'),
('lbl_unidad', 'lbl', 'registro_usuario', '{"es":"Unidad:","en":""}');


insert into idiomas.traduccion values
('descarga_lbl','lbl','reportes','{"es":"Descargar","en":"Download"}')
, ('descarga_pdf','lbl','reportes','{"es":"Descargar documento PDF","en":"Download PDF document"}');

insert into idiomas.traduccion values
('descarga_png','lbl','reportes','{"es":"Descargar documento PNG","en":"Download PNG document"}');

insert into idiomas.traduccion values
('print_grafica_lbl','lbl','reportes','{"es":"Imprimir gráfica","en":"Print chart"}')
, ('descarga_svg','lbl','reportes','{"es":"Descargar imagen en vectores SVG","en":"Download SVG vector image"}')
, ('descarga_jpeg','lbl','reportes','{"es":"Descargar imagen JPEG","en":"Download JPEG image"}');

insert into idiomas.traduccion values
('genero_lbl','lbl','reportes','{"es":"Género","en":"Gender"}');



insert into idiomas.traduccion values
('registros_lbl','lbl','reportes','{"es":"Registros","en":"Registros"}');

insert into sistema.modulos values
('REPORTES_MENU', '{"es":"Reportes","en":"Reports"}', '/reportes', null, true, null,1,'MENU', null)
,('REPORTES_GENERALES', '{"es":"Reportes generales","en":"General Reports"}', '/reportes_generales/reportes', null, true, 'REPORTES_MENU',2,'MENU', null)
,('REPORTES_IMSS', '{"es":"Reportes IMSS","en":"Reports IMSS"}', '/reportes_institucion/reportes', null, true, 'REPORTES_MENU',3,'MENU', null)
;
insert into sistema.roles_modulos values
('REPORTES_MENU','SUPERADMIN',true)
,('REPORTES_MENU','ADMIN',true)
,('REPORTES_GENERALES','SUPERADMIN',true)
,('REPORTES_GENERALES','ADMIN',true)
,('REPORTES_IMSS','SUPERADMIN',true)
,('REPORTES_IMSS','ADMIN',true)
;

insert into sistema.modulos values
('ADMIN_CAT_FORO','{"es":"Administración de catálogos del foro","en":"Administración catálogos foro"}'
, '#', null, true, 'ADMIN', 3, 'MENU', null);

insert into sistema.roles_modulos values
('ADMIN_CAT_FORO','SUPERADMIN',true)
,('ADMIN_CAT_FORO','ADMIN',true);

update sistema.modulos set modulo_padre_clave = 'ADMIN_CAT_FORO'
where clave_modulo in ('GESTCFO','GESTCVA','GESTEDO','GESTOPC','GESTRGS','GESTSCC','GESTIME');
insert into sistema.roles_modulos values
('GESTCFO','SUPERADMIN',true),('GESTCFO','ADMIN',true)
,('GESTCVA','SUPERADMIN',true),('GESTCVA','ADMIN',true)
,('GESTEDO','SUPERADMIN',true),('GESTEDO','ADMIN',true)
,('GESTOPC','SUPERADMIN',true),('GESTOPC','ADMIN',true)
,('GESTRGS','SUPERADMIN',true),('GESTRGS','ADMIN',true)
,('GESTSCC','SUPERADMIN',true),('GESTSCC','ADMIN',true)
,('GESTIME','SUPERADMIN',true),('GESTIME','ADMIN',true)
;

insert into sistema.modulos values
('PERMODPASS', '{"es":"Cambiar contraseña","en":"Reset password"}', '/perfil/password', null, true, 'PERFIL',3,'MENU', null);

insert into sistema.roles_modulos values
('PERMODPASS','SUPERADMIN',true)
,('PERMODPASS','ADMIN',true)
,('PERMODPASS','INV',true)
,('PERMODPASS','REVISOR',true)
,('PERMODPASS','CONSULTA',true)
;
 insert into idiomas.traduccion values
('porcentaje_lbl','lbl','reportes','{"es":"Porcentaje","en":"Percentage"}')
,('total_gral','lbl','reportes','{"es":"Total","en":"Total"}');

insert into idiomas.traduccion values
 ('lbl_porcentaje_delegacion','lbl','reportes_imss','{"es":"Delegación (nivel de atención 1 y 2)","en":"Delegación"}')
,('lbl_porcentaje_umae','lbl','reportes_imss','{"es":"UMAE (nivel de atención 3)","en":"UMAE"}');
insert into idiomas.traduccion values
('lbl_sin_registros','lbl','reportes','{"es":"No se encontro información","en":"No se encontro rinformación"}');
insert into idiomas.traduccion values
('title_nivel_atencion','title','reportes_imss','{"es":"Porcentaje de trabajos registrados por nivel de atención","en":"Porcentaje de trabajos registrados por nivel de atención"}');


-- Cambia el del titulo de reportes de "Total de trabajos registrados por Total de trabajos evaluados"
update idiomas.traduccion
set lang = '{"es":"Total de trabajos evaluados","en":""}'
where clave_traduccion = 'tab_t_exposiciones';

--Traducciones de notas de la grafica de calidad
INSERT INTO "idiomas"."traduccion" ("clave_traduccion", "clave_tipo", "clave_grupo", "lang")
VALUES ('nota_calidad_del', 'lbl', 'reportes_imss', '{"es":"Los valores aquí mostrados se  basan en los promedios de los trabajos de investigación revisados.","en":""}');

--Traducciones de notas de la grafica de porcentajes de nivle (4-julio-2018)
INSERT INTO "idiomas"."traduccion" ("clave_traduccion", "clave_tipo", "clave_grupo", "lang")
VALUES ('nota_porcentaje_nivel', 'lbl', 'reportes_imss', '{"es":"Se consideran unidades no medicas como Nivel central,nómina de mando etc.","en":""}');


--Insertar los modulos de reportes de seguimiento
insert into sistema.modulos values ('REPORTES_SEGUIMIENTO', '{"es":"Reportes de seguimiento","en":"Reports of tracing"}', '/reportes_seguimiento/reportes', null, true, 'REPORTES_MENU',4,'MENU', null);
insert into sistema.roles_modulos values ('REPORTES_SEGUIMIENTO','SUPERADMIN',true);

COMMIT;
