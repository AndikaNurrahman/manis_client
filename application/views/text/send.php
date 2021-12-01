 <link rel="stylesheet" type="text/css" href="<?= base_url();?>/plugins/editors/quill/quill.snow.css">
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/plugins/select2/select2.min.css">

        <!--  BEGIN CONTENT AREA  -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
<script >
    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata) {
          swal({
 
  title: 'Perhatian',
  text: flashdata,
      padding: '2em'
    });

    }
</script>
        <div id="content" class="main-content">
            <div class="layout-top-spacing">
            <div class="layout-px-spacing">
                <div class="widget-content widget-content-area">
                                    <form action="sends" method="post">
                                        <div class="form-group row mb-4">
                                            <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Ke</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                   <select class="form-control tagging" name="phone[]" multiple="multiple">
                                    <?php foreach($nomor->result() as $row): ?>
    <option value="<?= $row->nomor; ?>"><?= $row->nama; ?>   <?= $row->nomor; ?></option>
<?php endforeach; ?>
</select>                      </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Pesan</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                         
                                                  <textarea class="form-control" id="MyQuery"  name="text" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        <fieldset class="form-group mb-4">
                                            <div class="row">
                                                <label class="col-form-label col-xl-2 col-sm-3 col-sm-2 pt-0">Template Pesan</label>
                                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                                    <div class="form-check mb-2">
                                                        <div class="custom-control custom-radio classic-radio-info">
                                                            <input type="radio" id="hRadio1"  onclick="ModifyPlaceHolder(this)" name="classicRadio" class="custom-control-input">
                                                            <label class="custom-control-label" for="hRadio1">Pesan Pengingat</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <div class="custom-control custom-radio classic-radio-info">
                                                            <input type="radio" id="hRadio2" onclick="ModifyPlaceHolder(this)" name="classicRadio" class="custom-control-input">
                                                            <label class="custom-control-label" for="hRadio2">Pesan Gangguan</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <div class="custom-control custom-radio classic-radio-default">
                                                            <input type="radio" id="hRadio3" onclick="ModifyPlaceHolder(this)" name="classicRadio" class="custom-control-input" disabled="">
                                                            <label class="custom-control-label" for="hRadio3">Pesan Lunas</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary mt-3">Lets Go</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                </div>
                                </div>
     
   <script>
function ModifyPlaceHolder(element) {
  var data = {
    hRadio1:   <?php $row = $textdb->row(0); echo json_encode($row->text_wa);  ?>,
     hRadio2: <?php $row = $textdb->row(1); echo json_encode($row->text_wa);  ?>,
    hradio3: <?php $row = $textdb->row(3); echo json_encode($row->text_wa);  ?>
  };
  var input = element.form.MyQuery;
  input.value = data[element.id];
}

</script>
<script src="<?= site_url();?>/plugins/select2/select2.min.js"></script>            
 <script>
var ss = $(".tagging").select2({
    tags: true,
});

</script>

