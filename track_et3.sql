
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
,('calidad_genero','tab','reportes_calidad','{"es":"Calidad por genero","en":""}')
,('total_trabajos','tab','reportes_calidad','{"es":"Total trabajos nacionales y extranjeros evaluados","en":""}')
,('medicion_x','lbl','reportes_calidad','{"es":"Calidad / Cantidad de trabajos","en":""}')
,('calidad_ext_nac_ins_t','title','reportes_calidad','{"es":"Calidad nacionales y extranjeros","en":""}')
,('calidad_ext_nac_ins_st','subtitle','reportes_calidad','{"es":"Institucionales y no Institucionales","en":""}')
,('calidad_ext_nac_t','title','reportes_calidad','{"es":"Total de trabajos nacionales y extranjeros evaluados","en":""}')
,('calidad_genero_t','title','reportes_calidad','{"es":"Calidad por genero","en":""}')
,('calidad_genero_st_fmo','subtitle','reportes_calidad','{"es":"Masculino, Femenino y Otro","en":""}')
;