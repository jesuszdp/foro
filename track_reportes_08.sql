begin;
drop view if exists foro.calidad_por_seccion_evaluados;

CREATE OR REPLACE VIEW foro.calidad_por_seccion_evaluados as (
select d.folio, s.*, avg(dr.valor) promedio
from foro.dictamen d  
inner join foro.revision r on d.folio = r.folio and r.activo = true
inner join foro.detalle_revision dr on r.id_revision = dr.id_revision 
inner join foro.seccion s on dr.id_seccion =  s.id_seccion
group by d.folio, s.id_seccion, s.descripcion::varchar);
commit;

begin; 
update idiomas.traduccion set lang = '{"es":"Top de trabajos registrados","en":"Top de trabajos registrados"}' where clave_traduccion = 'tab_top' and clave_grupo ='reportes_imss';
update idiomas.traduccion set lang = '{"es":"Porcentaje de trabajos registrados","en":"Porcentaje de trabajos registrados"}' where clave_traduccion = 'tab_porcentaje' and clave_grupo ='reportes_imss';
insert into idiomas.traduccion (clave_traduccion, clave_tipo, clave_grupo, lang) values
('tab_top_evaluados','tab','reportes_imss','{"es":"Top de trabajos evaluados","en":"Top de trabajos evaluados"}'),
('tab_calidad_seccion','tab','reportes_imss','{"es":"Calidad de trabajos por sección evaluada","en":"Calidad de trabajos por sección evaluada"}');
commit;

begin; 
update idiomas.traduccion set lang = '{"es":"Número de trabajos registrados por","en":"Número de trabajos por"}' where clave_traduccion = 'titulo_top' and clave_grupo ='reportes_imss';
update idiomas.traduccion set lang = '{"es":"Porcentaje de trabajos registrados por","en":"Porcentaje de trabajos registrados por"}' where clave_traduccion = 'titulo_porcentaje' and clave_grupo ='reportes_imss';
update idiomas.traduccion set lang = '{"es":"Calidad de los trabajos evaluados por","en":"Calidad de los trabajos evaluados por"}' where clave_traduccion = 'titulo_calidad' and clave_grupo ='reportes_imss';
insert into idiomas.traduccion (clave_traduccion, clave_tipo, clave_grupo, lang) values 
('titulo_top_evaluados_umae','title','reportes_imss','{"es":"Número de trabajos evaluados del tipo $type$ registrados en UMAE","en":"Número de trabajos evaluados del tipo $type$ registrados en UMAE"}'),
('titulo_top_evaluados_del','title','reportes_imss','{"es":"Número de trabajos evaluados del tipo $type$ registrados en las delegaciones","en":"Número de trabajos evaluados del tipo $type$ registrados en las delegaciones"}'),
('titulo_top_evaluados_ext','title','reportes_imss','{"es":"Número de trabajos evaluados del tipo $type$ registrados por ususarios externos al IMSS","en":"Número de trabajos evaluados del tipo $type$ registrados por usuarios externos al IMSS"}'),
('titulo_calidad_seccion_umae','title','reportes_imss','{"es":"Calidad de trabajos por su $type$ registrados en UMAE","en":"Calidad de trabajos por su $type$ registrados en UMAE"}'),
('titulo_calidad_seccion_del','title','reportes_imss','{"es":"Calidad de trabajos por su $type$ registrados en UMAE","en":"Calidad de trabajos por su $type$ registrados en delegaciones"}'),
('titulo_calidad_seccion_ext','title','reportes_imss','{"es":"Calidad de trabajos por su $type$ registrados por usuarios externos al IMSS","en":"Calidad de trabajos por su $type$ registrados por usuarios externos al IMSS"}');
update idiomas.traduccion set lang = '{"es":"Trabajos registrados:","en":"Trabajos registrados:"}' where clave_traduccion = 'tooltip_top' and clave_grupo ='reportes_imss';
update idiomas.traduccion set lang = '{"es":"Trabajos registrados:","en":"Trabajos registrados:"}' where clave_traduccion = 'tooltip_porcentaje' and clave_grupo ='reportes_imss';
update idiomas.traduccion set lang = '{"es":"Calificación promedio:","en":"Calificación promedio:"}' where clave_traduccion = 'tooltip_calidad' and clave_grupo ='reportes_imss';
insert into idiomas.traduccion (clave_traduccion, clave_tipo, clave_grupo, lang) values 
('tooltip_top_evaluados','title','reportes_imss', '{"es":"Trabajs evaluados:","en":"Trabajos evaluados:"}'),
('tooltip_calidad_seccion','title','reportes_imss','{"es":"Calificación promedio:","en":"Calificación promedio:"}');
update idiomas.traduccion set lang = '{"es":"Trabajos registrados","en":"Trabajos registrados"}' where clave_traduccion = 'yaxis_top' and clave_grupo ='reportes_imss';
update idiomas.traduccion set lang = '{"es":"Promedio","en":"Promedio"}' where clave_traduccion = 'yaxis_calidad' and clave_grupo ='reportes_imss';
insert into idiomas.traduccion (clave_traduccion, clave_tipo, clave_grupo, lang) values 
('yaxis_top_evaluados','title','reportes_imss','{"es":"Trabajos evaluados","en":"Trabajos evaluados"}'),
('yaxis_calidad_seccion','title','reportes_imss','{"es":"Promedio","en":"Promedio"}');
commit;

begin;
update idiomas.traduccion set lang = '{"es":"Las UMAE que no aparecen en la gráfica no registraron trabajos de investigación","en":"Las UMAE que no aparecen en la gráfica no registraron trabajos de investigación"}' where clave_traduccion = 'nota_porcentaje_umae' and clave_grupo ='reportes_imss';
update idiomas.traduccion set lang = '{"es":"Las delegaciones que no aparecen en la gráfica no registraron trabajos de investigación","en":"Las delegaciones que no aparecen en la gráfica no registraron trabajos de investigación"}' where clave_traduccion = 'nota_porcentaje_del' and clave_grupo ='reportes_imss';
update idiomas.traduccion set lang = '{"es":"Se consideran unidades no medicas como nivel central,nómina de mando etc.","en":"Se consideran unidades no medicas como Nivel central,nómina de mando etc"}' where clave_traduccion = 'nota_porcentaje_nivel' and clave_grupo ='reportes_imss';
update idiomas.traduccion set lang = '{"es":"No se encontró información","en":"No se encontró información"}' where clave_traduccion = 'lbl_sin_registros' and clave_grupo = 'reportes';
commit;

begin;
update idiomas.traduccion set lang = '{"es":"Los valores aquí mostrados se basan en los promedios de los trabajos de investigación revisados.","en":"Los valores aquí mostrados se basan en los promedios de los trabajos de investigación revisados."}' where clave_traduccion = 'nota_calidad_del' and clave_grupo = 'reportes_imss';
insert into idiomas.traduccion (clave_traduccion, clave_tipo, clave_grupo, lang) values 
('nota_calidad_umae','nota','reportes_imss','{"es":"Los valores aquí mostrados se basan en los promedios de los trabajos de investigación revisados.","en":"Los valores aquí mostrados se basan en los promedios de los trabajos de investigación revisados."}');
commit;

begin;
insert into idiomas.traduccion (clave_traduccion, clave_tipo, clave_grupo, lang) values
('nota_evaluados_umae','nota','reportes_imss','{"es":"En la gráfica aparecen únicamente las UMAE que registraron trabajos y no fueron rechazados.","en":"En la gráfica aparecen únicamente las UMAE que registraron trabajos y no fueron rechazados."}'),
('nota_evaluados_del','nota','reportes_imss','{"es":"En la gráfica aparecen únicamente las delegaciones que registraron trabajos y no fueron rechazados.","en":"En la gráfica aparecen únicamente las delegaciones que registraron trabajos y no fueron rechazados."}'),
('nota_evaluados_ext','nota','reportes_imss','{"es":"En la gráfica aparecen únicamente los países de usuarios externos que registraron trabajos y no fueron rechazados.","en":"En la gráfica aparecen únicamente los países de usuarios externos que registraron trabajos y no fueron rechazados."}');
insert into idiomas.traduccion (clave_traduccion, clave_tipo, clave_grupo, lang) values
('select_tipo_investigacion','dropdown','reportes_imss','{"es":"Seleccione el tipo de investigación","en":"Seleccione el tipo de investigación"}'),
('select_seccion_calidad','dropdown','reportes_imss','{"es":"Seleccione la sección evaluada","en":"Seleccione la sección evaluada"}');
commit;

begin;
update foro.seccion set descripcion = '{"es":"Calidad del resumen","en":"Calidad del resumen"}' where id_seccion = 1;
update foro.seccion set descripcion = '{"es":"Originalidad","en":"Originalidad"}' where id_seccion = 2;
update foro.seccion set descripcion = '{"es":"Calidad Metodológica (Metodologías Cuantitativas)","en":"Calidad Metodológica (Metodologías Cuantitativas)"}' where id_seccion = 3;
update foro.seccion set descripcion = '{"es":"Trascendencia","en":"Trascendencia"}' where id_seccion = 4;
update foro.seccion set descripcion = '{"es":"Aspectos éticos","en":"Aspectos éticos"}' where id_seccion = 5;
update foro.seccion set descripcion = '{"es":"Calidad Metodológica (Metodologías Cualitativas)","en":"Calidad Metodológica (Metodologías Cualitativas)"}' where id_seccion = 6;
update foro.seccion set descripcion = '{"es":"Calidad Metodológica (Metodologías Mixtas)","en":"Calidad Metodológica (Metodologías Mixtas)"}' where id_seccion = 7;
commit;

-- Cambios 21/08/2018
begin;
update idiomas.traduccion set lang = '{"es":"Número de trabajos evaluados del tipo $type$","en":"Número de trabajos evaluados del tipo $type$"}' where clave_traduccion = 'titulo_top_evaluados_umae' and clave_grupo = 'reportes_imss';
update idiomas.traduccion set lang = '{"es":"Número de trabajos evaluados del tipo $type$","en":"Número de trabajos evaluados del tipo $type$"}' where clave_traduccion = 'titulo_top_evaluados_del' and clave_grupo = 'reportes_imss';
update idiomas.traduccion set lang = '{"es":"Número de trabajos evaluados del tipo $type$","en":"Número de trabajos evaluados del tipo $type$"}' where clave_traduccion = 'titulo_top_evaluados_ext' and clave_grupo = 'reportes_imss';
update idiomas.traduccion set lang = '{"es":"Calidad de trabajos por su $type$","en":"Calidad de trabajos por su $type$"}' where clave_traduccion = 'titulo_calidad_seccion_umae' and clave_grupo = 'reportes_imss';
update idiomas.traduccion set lang = '{"es":"Calidad de trabajos por su $type$","en":"Calidad de trabajos por su $type$"}' where clave_traduccion = 'titulo_calidad_seccion_del' and clave_grupo = 'reportes_imss';
update idiomas.traduccion set lang = '{"es":"Calidad de trabajos por su $type$","en":"Calidad de trabajos por su $type$"}' where clave_traduccion = 'titulo_calidad_seccion_ext' and clave_grupo = 'reportes_imss';
commit;