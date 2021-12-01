<link rel="stylesheet" type="text/css" href="<?= base_url();?>/plugins/select2/select2.min.css">
<script src="<?= base_url();?>/plugins/select2/select2.min.js"></script>
<script src="<?= base_url();?>/plugins/flatpickr/flatpickr.js"></script>
   <script src="<?= base_url();?>/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js"></script>
<div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row invoice layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                   
                    
                    <div class="row">

                        <div id="date_time_picker" class="col-lg-12 layout-top-spacing">
                            <div class="seperator-header">
                                <h4 class="">Generate Invoice</h4>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                 
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Tambah Tagihan </h4> 
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                   <form action="multiadd" method="post">
                                    <div class="form-group mb-0">
                                        <input id="dateTimeFlatpickr" value="2021-09-04" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                                    </div>
                                 </form>

                                </div>
                                <select class="form-control nested">
    <optgroup label="PPPOE">
    <?php foreach ($query->result() as $bars): ?>
            
    
        <option selected="<?php echo $bars->nama; ?>"><?php echo $bars->nama; ?> <?php echo $bars->tempo; ?></option>
     
            <?php endforeach ?>
    </optgroup>
    <optgroup label="IPSTATIC">
          <?php foreach ($query1->result() as $barss): ?>
        <option><?php echo $barss->nama; ?> <?php echo $barss->tempo; ?></option>
       
         <?php endforeach ?>
    </optgroup>
  </select>
                            </div>
                        </div>


                                            <script >var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
   
    dateFormat: "Y-m",
});</script> 
                                            <script >$(".nested").select2({ tags: true});</script>


                                        </div>
                                        </div>

                                    
                            </div>
                        </div>

           
