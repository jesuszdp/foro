<?php ?>


<!-- listas de reportes generales -->

<!-- Content area -->
<div class="content-area">

  <!-- <div id="main"> -->
  <section class="page-section background-img">
    <div class="container">
      <div class="row">
      <div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid vc_custom_1465704297829 vc_row-has-fill" style="position: relative; left: -89.5px; box-sizing: border-box; width: 1349px; padding-left: 89.5px; padding-right: 89.5px;">
        <div class="wpb_column vc_column_container vc_col-sm-8">
          <div class="vc_column-inner ">
            <div class="wpb_wrapper">
              <h3 class="section-title ">
                <span data-animation="flipInY" data-animation-delay="300" class="icon-inner animated flipInY visible"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-question fa-stack-1x"></i></span></span>
                <span data-animation="fadeInRight" data-animation-delay="500" class="title-inner animated fadeInRight visible">Reportes generales</span><br><br>
              </h3>
            </div>
          </div>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-4">
          <div class="vc_column-inner ">
            <div class="wpb_wrapper">
            </div>
          </div>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-12">
          <div class="vc_column-inner vc_custom_1417508840067">
            <div class="wpb_wrapper">
              <div class="row faq   animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100">
                <div class="col-sm-6 col-md-6 pull-left">
                  <ul id="tabs-faq" class="style1 nav">
                    <li class="control" id="tab_1" data-tab="1"><a href="<?php echo base_url("index.php/reportes_generales/reportes/1"); ?>" data-toggle="tab"><i class="fa fa-plus"></i> <span class="faq-inner">Total de exposiciónes</span></a></li>
                    <li class="control" id="tab_2" data-tab="2"><a href="<?php echo base_url("index.php/reportes_generales/reportes/2"); ?>"data-toggle="tab"><i class="fa fa-plus"></i> <span class="faq-inner">Total de participantes nacionales y extranjeros </span></a></li>
                    <li class="control" id="tab_3" data-tab="3"><a href="<?php echo base_url("index.php/reportes_generales/reportes/3"); ?>" data-toggle="tab"><i class="fa fa-plus"></i> <span class="faq-inner">Total de participantes por género</span></a></li>
                    <!-- <li class="active"><a href="#tab-981039400543" data-toggle="tab"><i class="fa fa-angle-right"></i> <span class="faq-inner">Calidad de trabajos IMSS nacionales</span></a></li> -->
                  </ul>
                </div>
                <div class="col-sm-6 col-md-6 pull-right">
                  <div class="tab-content">
                    <div class="tab-pane fade active in">
                      <!-- grafica -->
                      <?php
                      if (isset($view_reporte)) {
                          echo $view_reporte;
                      }
                      ?>
                    </div>
                    <!-- <div id="tab-961039400543" class="tab-pane fade">
                      <img src="../public/img/4.png" alt="">
                    </div>
                    <div id="tab-971039400543" class="tab-pane fade">
                      <img src="../public/img/genero.png" alt="">
                  </div>               -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
</div>

<script>
$(document).ready(function(){
    $(".control").click(function(){
        select_tabs_data(this);
    });
});

function select_tabs_data(element) {
    var seccion = $(element).data("tab");
    console.log(seccion);
  //  var tabs = document.getElementById("tab").value;

    $('.control').each(function()
      {
        $(this).removeClass("in active");
      }
    );
    $('#tab_' + seccion).addClass("in active");
}
</script>
