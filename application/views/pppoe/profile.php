   <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                
                <div class="page-header">
                    <div class="page-title">
                        <h3>PPPOE</h3>
                    </div>
<td><button class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Tambah</button> </td>
                                    </div>
                </div>

                <!-- CONTENT AREA -->
   


                
              
                <div class="row" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="default-ordering" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Paket</th>
                                            <th>Harga Paket</th>
                                                                                 
                                            <th class="text-center">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                    <?php
    $API->write('/ppp/profile/getall');
    $ARRAY = $API->read();
    $data  = $ARRAY;
    
                                     
    $pool =  $API->comm('/ip/pool/print');
?>
                                         <?php foreach( $data as $index => $baris ) : ?> 
   <tr>
    <td><?php echo $baris['.id']; ?></td>
                                <td><?php echo $baris['name']; ?></td>
                            
                          <?php
                              $pieces = explode("|", $baris['comment']);
                                            $wa = $pieces[0];
                                             $tgl = $pieces[1]; ?>
                                             <td>RP.<?= $wa;?>.000</td>
                                             <td class="text-center"><?= $tgl;?></td>


               <?php endforeach; ?>  
           </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                       
                             
                            <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>TAMBAH CLIENT</h5>
                <button type='button'class='close' data-dismiss='modal' aria-label='Close'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-server'><rect x='2' y='2' width='20' height='8' rx='2' ry='2'></rect><rect x='2' y='14' width='20' height='8' rx='2' ry='2'></rect><line x1='6' y1='6' x2='6' y2='6'></line><line x1='6' y1='18' x2='6' y2='18'></line></svg>
                </button>
            </div>
            <div class='modal-body'>
              
<form action="<?= base_url('pppoe/tambahPpp');?>" method="post" >
    <div class='row mb-4'>
        <div class='col'>
            <input type='text' name='name' class='form-control' placeholder='...@beli.net' required>
        </div>
        <div class='col'>
            <input type='password' name='password' class='form-control' placeholder='password' required>
        </div>
      
    </div>
   
 <select name="profile" class='custom-select mb-4'>
    <option name="profile" selected>PAKET</option>
  
                                         <?php 
                                        $API->write('/ppp/profile/getall');
                                        $PROFILE = $API->read();
                                        $p = $PROFILE;
                                        foreach( $p as $index => $baris ) : 
                                            echo "<option name='profile' value='".$baris['name']."'>".$baris['name']."</option>";
                                        endforeach;
                                    ?>
  </select>
<div class='form-group mb-4 mt-3'>
                                            <label for='exampleFormControlFile1'>NOMER WA|tanggal daftar</label>
                                            <input type='tel' name='comment' placeholder='62123456789|1' class='form-control-file' id='exampleFormControlFile1' required>
                                        </div>
            <div class='modal-footer'>
                <button class='btn' data-dismiss='modal'><i class='flaticon-cancel-12'></i> Discard</button>
                <button type='submit' name='Save' class='btn btn-primary'>Save</button>
            </div>
            </form>
        </div>
    </div>
</div>     
<!-- Modal -->
<div class="modal fade" id="isolir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ISOLIR <?= $baris['.id']?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-server'><rect x='2' y='2' width='20' height='8' rx='2' ry='2'></rect><rect x='2' y='14' width='20' height='8' rx='2' ry='2'></rect><line x1='6' y1='6' x2='6' y2='6'></line><line x1='6' y1='18' x2='6' y2='18'></line></svg>
                </button>
            </div>
        <form action="pppoe/isolir/<?= $baris['.id']?>." method="post" >
 

            <div class='modal-footer'>
                <button class='btn' data-dismiss='modal'><i class='flaticon-cancel-12'></i> Discard</button>
                <button type='submit' name='Save' class='btn btn-primary'>Save</button>
            </div>
            </form>
           
        </div>
    </div>
</div>
 