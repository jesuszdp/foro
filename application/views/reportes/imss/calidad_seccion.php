<?php ?>
<script src="<?php echo asset_url(); ?>highcharts/highcharts.js"></script>
<script src="<?php echo asset_url(); ?>highcharts/data.js"></script>
<script src="<?php echo asset_url(); ?>highcharts/modules/exporting.js"></script>



<div class="schedule-tabs lv2">
    <ul id="tabs-lv21"  class="nav nav-justified">
        <li class="active"><a href="#tab-lv21-first" data-toggle="tab" name="umae">UMAE</a></li>
        <li><a href="#tab-lv21-second"  data-toggle="tab" name="del">Delegación</a></li>
        <li><a href="#tab-lv21-third"  data-toggle="tab" name="ext">Externos</a></li>
    </ul>
</div>

<div class="tab-content lv2">
    <div id="tab-lv21-first" class="tab-pane fade in active">
        <div class="ajuste">
            <div class="form-group">
                <label for="select_umae" class="col-sm-4 control-label">Seleccione la sección evaluada: </label>
                <div class="col-sm-6">
                    <select id="select_umae" class="form-control">
                        <option value="0">Seleccione una opción</option>
                        <?php
                        pr($secciones);
                        foreach ($secciones as $key => $value) {
                            echo "<option value='".$value['id']."'>".$value['valor']."</option>";
                        }
                        ?>
                    </select>        
                </div>
            </div> <!-- form group-->
            <br>
            <div id="grafica_umae" style="width:100%;height:400px;padding-top:5%";></div>
            <br>
            <div><p id="pie_porcentaje_umae"></p></div>
        </div>
    </div>
    <div id="tab-lv21-second" class="tab-pane fade in ">
        <div class="ajuste">
            <div class="form-group">
                <label for="select_delegacion" class="col-sm-4 control-label">Seleccione el tipo de investigación: </label>
                <div class="col-sm-6">
                    <select id="select_delegacion" class="form-control">
                        <option value="0">Seleccione una opción</option>
                        <?php
                        foreach ($secciones as $key => $value) {
                            echo "<option value='".$value['id']."'>".$value['valor']."</option>";
                        }
                        ?>
                    </select>        
                </div>
            </div> <!-- form group-->
            <br>
            <div id="grafica_delegacion" style="width:100%; height:400px;padding-top:5%"></div>
        </div>
    </div>
    <div id="tab-lv21-third" class="tab-pane fade in ">
        <div class="ajuste">
            <div class="form-group">
                <label for="select_externo" class="col-sm-4 control-label">Seleccione el tipo de investigación: </label>
                <div class="col-sm-6">
                    <select id="select_externo" class="form-control">
                        <option value="0">Seleccione una opción</option>
                        <?php
                        foreach ($secciones as $key => $value) {
                            echo "<option value='".$value['id']."'>".$value['valor']."</option>";
                        }
                        ?>
                    </select>        
                </div>
            </div> <!-- form group-->
            <br>
            <div id="grafica_externo" style="width:100%; height:400px;padding-top:5%"></div>
        </div>
    </div>
</div>

<?php echo js('reportes/imss/calidad_seccion.js'); ?>
<script>
    $("#calidad").removeClass();
    $("#top_registrados").removeClass();
    $("#porcentaje_registrados").removeClass();
    $("#top_evaluados").removeClass();
    $('#calidad_seccion').addClass("active");
</script>