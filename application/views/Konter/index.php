
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
<link href="<?= base_url() ?>/assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
<div id="content" class="main-content">

    <div class="row layout-px-spacing">


     <div class="container">
        <div class="row layout-top-spacing">




            <div id="tabsWithIcons" class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Pulsa Token dan Voucher Game</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area rounded-pills-icon">

                        <ul class="nav nav-pills mb-4 mt-3  justify-content-center" id="rounded-pills-icon-tab" role="tablist">
                           <li class="nav-item ml-2 mr-2">
                            <a class="nav-link mb-2 text-center" id="rounded-pills-icon-contact-tab" data-toggle="pill" href="#rounded-pills-icon-contact" role="tab" aria-controls="rounded-pills-icon-contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> Pulsa</a>
                        </li>
                        <li class="nav-item ml-2 mr-2">
                            <a class="nav-link mb-2 text-center" id="rounded-pills-icon-profile-tab" data-toggle="pill" href="#rounded-pills-icon-profile" role="tab" aria-controls="rounded-pills-icon-profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg> Token</a>
                        </li>


                        <li class="nav-item ml-2 mr-2">
                            <a class="nav-link mb-2 text-center" id="rounded-pills-icon-settings-tab" data-toggle="pill" href="#rounded-pills-icon-settings" role="tab" aria-controls="rounded-pills-icon-settings" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Game </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="rounded-pills-icon-tabContent">
                        <div class="tab-pane fade show active" id="rounded-pills-icon-home" role="tabpanel" aria-labelledby="rounded-pills-icon-home-tab">


                           <h3 class="text-center">
                             Tersedia Pulsa, Token Serta Voucher game. Pembayaran bisa langsung atau ditambahkan dengan biaya bulanan wifi Balinet 

                         </h3>       
                     </div>
                     <div class="tab-pane fade" id="rounded-pills-icon-contact" role="tabpanel" aria-labelledby="rounded-pills-icon-contact-tab">


                        <form action="konter/beli" method="post" >

                          <div class="row">
                              <div class="input-group mb-4">
                                <div  class="input-group-prepend" id="spinners"  >
                                    <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></span>
                                </div>
                                <input type="number" class="form-control" id="nomor" name="nomor" placeholder="Masukan Nomor HP ANDA" aria-label="Text input with dropdown button">
                                <input type="hidden" name="idp" value="<?= $user_id; ?>">

                            </div>                                         
                        </div>                                         


                        <p class="text-center" id="perdana"> </p>


                        <div id="contents"></div>

                    </form>
                </div>

                <div class="tab-pane fade" id="rounded-pills-icon-profile" role="tabpanel" aria-labelledby="rounded-pills-icon-profile-tab">
                  <form action="konter/token" method="post">
                    <div class="form-row mb-4">
                       <div class="col-7">
                         <select name="pay" class="selectpicker form-control">
                            <option value="MANUAL">MANUAL</option>
                            <option value="LANGSUNG">LANGSUNG</option>
                        </select>
                    </div>
                    <div class="col-7">
                        <input type="number" name="id" class="form-control" placeholder="Nomor meter atau id pln">
                    </div>
                    <div class="col">
                        <input type="nomor"  name="nomor" class="form-control" placeholder="Nomor HP">
                        <input type="hidden" name="idp">
                    </div>
                    <div class="col">
                       <select name="code" class="selectpicker form-control">
                         <?php $res = json_decode(harga('pln'),true);   ?>
                         <?php for ($i = 0; $i < count($res['message']) ; $i++) { ?>

                            <option value="<?= $res['message'][$i]['code']; ?>|<?= $res['message'][$i]['price']; ?>"><?= $res['message'][$i]['description']; ?></option>
                        <?php } ?>
                    </select>


                    <?php $i++ ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4 mr-2">Beli</button>
        </form>

        <div  class="table-responsive">
            <table id="reload-data"  class="table table-bordered table-striped mb-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Sale</th>

                    </tr>
                </thead>
                <tbody>

                 <?php $result = json_decode(harga('pln'),true);   ?>
                 <?php for ($i = 0; $i < count($result['message']) ; $i++) { ?>
                    <?php $harga = $result['message'][$i]['price']+1105; ?>
                    <tr>


                        <td>
                            <div class="d-flex">
                                <div class="usr-img-frame mr-2 rounded-circle">
                                    <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg">
                                </div>
                                <p class="align-self-center mb-0"><?= $result['message'][$i]['operator']; ?></p>
                            </div>
                        </td>
                        <td><?= $result['message'][$i]['description']; ?></td>
                        <td>RP. <?php echo number_format($harga,2,',','.'); ?></td>

                    </tr>
                <?php } ?>
                <?php $i++ ?>
            </tbody>
        </table>
    </div>
</div>





<div class="tab-pane fade" id="rounded-pills-icon-settings" role="tabpanel" aria-labelledby="rounded-pills-icon-settings-tab">
    <ul class="nav nav-pills mb-4 mt-3  justify-content-center" id="rounded-circle-pills-icon-tab" role="tablist">
        <li class="nav-item mr-2">
            <a class="nav-link mb-1 rounded-circle active" id="rounded-circle-pills-icon-home-tab" data-toggle="pill" href="#rounded-circle-pills-icon-home" role="tab" aria-controls="rounded-circle-pills-icon-home" aria-selected="true"><img alt="avatar" class="img-fluid" src="assets/img/game/ff.png"></a>
        </li>
        <li class="nav-item ml-2 mr-2">
            <a class="nav-link mb-1 rounded-circle" id="rounded-circle-pills-icon-profile-tab" data-toggle="pill" href="#rounded-circle-pills-icon-profile" role="tab" aria-controls="rounded-circle-pills-icon-profile" aria-selected="false"><img alt="avatar" class="img-fluid" src="assets/img/game/pubg.png"></a>
        </li>
        <li class="nav-item ml-2 mr-2">
            <a class="nav-link mb-1 rounded-circle" id="rounded-circle-pills-icon-contact-tab" data-toggle="pill" href="#rounded-circle-pills-icon-contact" role="tab" aria-controls="rounded-circle-pills-icon-contact" aria-selected="false"><svg> ... </svg></a>
        </li>

        <li class="nav-item ml-2 mr-2">
            <a class="nav-link mb-1 rounded-circle" id="rounded-circle-pills-icon-settings-tab" data-toggle="pill" href="#rounded-circle-pills-icon-settings" role="tab" aria-controls="rounded-circle-pills-icon-settings" aria-selected="false"> <img alt="avatar" class="img-fluid " src="assets/img/game/ML.png"></a>
        </li>
    </ul>

    <div class="tab-content" id="rounded-circle-pills-icon-tabContent">
        <div class="tab-pane fade show active" id="rounded-circle-pills-icon-home" role="tabpanel" aria-labelledby="rounded-circle-pills-icon-home-tab">
            <p class="mb-4">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.                                                
          </p>

          <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>
      </div>
      <div class="tab-pane fade" id="rounded-circle-pills-icon-profile" role="tabpanel" aria-labelledby="rounded-circle-pills-icon-profile-tab">
        <div class="media">
            <img class="mr-3" src="assets/img/90x90.jpg" alt="Generic placeholder image">
            <div class="media-body">
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="rounded-circle-pills-icon-contact" role="tabpanel" aria-labelledby="rounded-circle-pills-icon-contact-tab">
        <p class="dropcap  dc-outline-primary">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
    <div class="tab-pane fade" id="rounded-circle-pills-icon-settings" role="tabpanel" aria-labelledby="rounded-pills-icon-settings-tab">
        <blockquote class="blockquote">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        </blockquote>
    </div>
</div>
</div>
</div>


</div>
</div>
</div>
</div>


<div class="statbox widget box box-shadow">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Tagihan</h4>
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area">
        <div class="table-responsive">
            <table class="table table-bordered mb-4">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th class="text-center">Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Shaun Park</td>
                        <td>10/08/2019</td>
                        <td>320</td>
                        <td class="text-center"><span class="text-success">Complete</span></td>

                        <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></td>
                    </tr>

                </tbody>
            </table>
        </div>


    </div>
</div>
</div>
</div>

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
<script >
    var telkomsel=["0812","0813","0821","0822","0852","0853","0823","0851"];
    var indosat=["0814","0815","0816","0855","0856","0857","0858"];
    var three=["0895","0896","0897","0898","0899"];
    var smartfren=["0881","0882","0883","0884","0885","0886","0887","0888","0889"];
    var xl=["0817","0818","0819","0859","0877","0878"];
    var axis=["0838","0831","0832","0833"];
    $("#nomor").keyup( function() { 



     var ambilno = $(this).val();
     var panjangno=ambilno.length;
     var key = '';
     var t;
                   if(panjangno>=4&&panjangno<=12){//kondisi dimana panjang no hp harus 10 samapi 12 karakter selain itu di block elsenya baris 88
                    t=ambilno.substring(0,4);
    //proses pengecekan masing-masing array no
    var a= telkomsel.length;
    var b=0;
    var kondisi=true;
   //bukannomor=true;
   while(b<a){
    if(telkomsel[b]==t){
     key = "TELKOMSEL";
     document.getElementById("perdana").innerHTML = "Telkomsel";
     kondisi=false;
 }++b;
}
    //jika menemukan salah satu nomor dari didalam array, maka tidak akan mengecek array lainnya indikatornya adalah variable kondisi
    a=indosat.length;
    b=0;
    while(b<a&&kondisi){
        if(indosat[b]==t){
           key = "INDOSAT";

           document.getElementById("perdana").innerHTML = "Indosat";
           kondisi=false;
       }++b;
   }

   a=three.length;
   b=0;
   while(b<a&&kondisi){
    if(three[b]==t){
        var key = "TRI";
        document.getElementById("perdana").innerHTML = "TRI";
        kondisi=false;
    }++b;
}
a=smartfren.length;
b=0;
while(b<a&&kondisi){
    if(smartfren[b]==t){
       key = " smartfren";
       document.getElementById("perdana").innerHTML = "smartfren";
       kondisi=false;
   }++b;
}
a=xl.length;
b=0;
while(b<a&&kondisi){
    if(xl[b]==t){
      document.getElementById("perdana").innerHTML = "XL";
      key = "XL";
      kondisi=false;
  }++b;
}
a=axis.length;
b=0;
while(b<a&&kondisi){
    key = "AXIS";
    document.getElementById("perdana").innerHTML = "Axis";
    kondisi=false;
}++b;
}else{
   document.getElementById("perdana").innerHTML = "TIDAK ADA NOMOR";

}


if (key!='') {
  $.get('konter/getcontent/' + key, function(data){
    $('#contents').html(data);
});
}
});


</script>




<script type="text/javascript">

    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");

      var id = $("#id").val();
      var nama = $("#nama").val();
      var paket = $("#paket").val();
      var no = $("#no").val();
      var tarif = $("#tarif").val();

      $.ajax({
        type : 'POST',
        url: '<?=site_url()?>snap/token',
        data: {
            id: id,
            nama: nama,
            paket: paket,
            no: no,
            tarif: tarif
        },
        cache: false,

        success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
      }

      snap.pay(data, {

          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
        },
        onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
        },
        onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
        }
    });
  }
});
  });
</script>