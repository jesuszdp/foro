BEGIN;
/*Autor Claudia, vista para generar reporte de calidad por delegación*/
create view foro.trabajos_registrados_imss as 
select ti.folio, iu.matricula, left(u.clave_unidad,2) clave_delegacional , d.folio_dictamen, d.promedio, hiu.clave_departamental, u.clave_unidad, u.es_umae
from foro.trabajo_investigacion ti
inner join foro.dictamen d on ti.folio = d.folio
inner join foro.autor a on ti.folio = a.folio_investigacion
inner join sistema.informacion_usuario iu on a.id_informacion_usuario = iu.id_informacion_usuario
inner join sistema.historico_informacion_usuario hiu on iu.id_informacion_usuario = hiu.id_informacion_usuario and hiu.actual = true
inner join catalogo.departamento dep on hiu.clave_departamental = dep.clave_departamental
inner join catalogo.unidad u on dep.clave_unidad = u.clave_unidad
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

COMMIT;
-- :CLAPAS textos para reportes de institucion
BEGIN;
INSERT INTO idiomas.traduccion (clave_traduccion, clave_tipo, clave_grupo, lang) values
('tab_top','tab','reportes_imss','{"es":"Top de trabajos registrados","en":""}'),
('tab_porcentaje','tab','reportes_imss','{"es":"Porcentaje de trabajos registrados","en":""}'),
('tab_calidad','tab','reportes_imss','{"es":"Calidad de trabajos evaluados","en":""}'),
('titulo_top','title','reportes_imss','{"es":"Número de trabajos registrados por","en":""}'),
('titulo_porcentaje','title','reportes_imss','{"es":"Porcentaje de trabajos registrados por","en":""}'),
('titulo_calidad','title','reportes_imss','{"es":"Calidad de los trabajos evaluados por","en":""}'),
('tooltip_top','txt','reportes_imss','{"es":"Trabajos registrados:","en":""}'),
('tooltip_porcentaje','txt','reportes_imss','{"es":"Trabajos registrados:","en":""}'),
('tooltip_calidad','txt','reportes_imss','{"es":"Calificación promedio:","en":""}');
COMMIT;

BEGIN;
INSERT INTO idiomas.traduccion
(clave_traduccion, clave_tipo, clave_grupo, lang)
VALUES('reporte_general_title', 'lbl', 'reportes_generales', '{"es":"Reportes generales","en":""}');


INSERT INTO idiomas.traduccion
(clave_traduccion, clave_tipo, clave_grupo, lang)
VALUES('reporte_general_title', 'lbl', 'reportes_generales', '{"es":"Reportes generales","en":""}');

INSERT INTO idiomas.traduccion
(clave_traduccion, clave_tipo, clave_grupo, lang)
VALUES('tab_t_exposiciones', 'tab', 'reportes_generales', '{"es":"Total de trabajos registrados","en":""}');

INSERT INTO idiomas.traduccion
(clave_traduccion, clave_tipo, clave_grupo, lang)
VALUES('t_exposiciones', 'lbl', 'reportes_generales', '{"es":"Total de trabajos registrados","en":""}');

INSERT INTO idiomas.traduccion
(clave_traduccion, clave_tipo, clave_grupo, lang)
VALUES('tab_t_nac_ext', 'tab', 'reportes_generales', '{"es":"Total de trabajos de autores nacionales y extranjeros","en":""}');

INSERT INTO idiomas.traduccion
(clave_traduccion, clave_tipo, clave_grupo, lang)
VALUES('t_nac_ext', 'lbl', 'reportes_generales', '{"es":"Total de trabajos de autores nacionales y extranjeros","en":""}');


INSERT INTO idiomas.traduccion
(clave_traduccion, clave_tipo, clave_grupo, lang)
VALUES('tab_t_genero', 'tab', 'reportes_generales', '{"es":"Total de trabajos por género","en":""}');

INSERT INTO idiomas.traduccion
(clave_traduccion, clave_tipo, clave_grupo, lang)
VALUES('t_genero', 'lbl', 'reportes_generales', '{"es":"Total de trabajos por género","en":""}');
COMMIT;
-- CLAPAS: textos para reportes de institucion
BEGIN;
INSERT INTO idiomas.traduccion (clave_traduccion, clave_tipo, clave_grupo, lang) values
('yaxis_top','lbl','reportes_imss','{"es":"Trabajos registrados","en":""}'),
('yaxis_calidad','lbl','reportes_imss','{"es":"Promedio","en":""}'),
('nota_porcentaje_umae','nota','reportes_imss','{"es":"Las UMAE que no aparecen en la gráfica no registraron trabajos de investigación","en":""}'),
('nota_porcentaje_del','nota','reportes_imss','{"es":"Las delegaciones que no aparecen en la gráfica no registraron trabajos de investigación","en":""}');
COMMIT;

-- AlesitaSpock

BEGIN;
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
('lbl_otro', 'lbl', 'reportes_generales', '{"es":"Otro","en":""}');
COMMIT;

BEGIN;
insert into idiomas.traduccion values 
('descarga_lbl','lbl','reportes','{"es":"Descargar","en":"Download"}')
, ('descarga_pdf','lbl','reportes','{"es":"Descargar documento PDF","en":"Download PDF document"}');
COMMIT;

BEGIN;
insert into idiomas.traduccion values 
('descarga_png','lbl','reportes','{"es":"Descargar documento PNG","en":"Download PNG document"}');
COMMIT;

