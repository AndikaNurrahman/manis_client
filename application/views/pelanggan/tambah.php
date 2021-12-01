<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>

<div id="content" class="main-content">

    <div class="layout-px-spacing">



        <div class="row layout-top-spacing">


            <div class="col-lg-12 layout-spacing">
                <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">

                                    <h4>Tambah Pelanggan</h4>
                                    <a href="javascript:();" data-toggle="modal" data-target="#importexcel" data-toggle="modal" data-target="#ubah-data">
                                        <button data-toggle='modal' data-target='#exampleModal' class="btn btn-warning mb-2 mr-2 btn-rounded">Import dari excel <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg></button></a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form action="add" method="POST">
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Email</label>
                                        <input type='email' name='nama' class='form-control' placeholder='Email' required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Password</label>
                                        <input type='password' name='password' class='form-control' placeholder='Password' required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="inputAddress">IP-Address</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="192.168....">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="inputAddress2">Alamat</label>
                                    <input type='text' name='alamat' class='form-control' placeholder='Alamat' required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="inputAddress2">Nomor WA</label>
                                    <input type='tel' name='nomor' class='form-control' placeholder='6281949849449' required>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Service</label>
                                        <select class='custom-select mb-4' name="mode" data-live-search="true">
                                            <option value="IPSTATIC">IPSTATIC</option>
                                            <option value="PPPOE">PPPOE</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Paket</label>
                                        <select name='paket' id='paket' class='custom-select mb-4'>
                                            <?php foreach ($paket->result() as $baris) { ?>
                                                <option value="<?php echo $baris->paket_id; ?>"><?php echo $baris->paket; ?></option>
                                            <?php } ?>

                                        </select>

                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">Jatuh Tempo</label>
                                        <input type='text' name='tempo' class='form-control' placeholder='01' required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block">Tambah</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    const flashdata = $('.flash-data').data('flashdata');

    if (flashdata) {

        swal({



            title: 'Perhatian',

            text: flashdata,

            padding: '2em'

        });



    }
</script>
<!-- Modal -->
<script>
    $(document).ready(function() {

        // Untuk sunting

        $('#tambahtagihan').on('show.bs.modal', function(event) {

            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            var modal = $(this)



            // Isi nilai pada field



        });

    });
</script>




<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="importexcel" class="modal fade">

    <div class='modal-dialog' role='document'>

        <div class='modal-content'>

            <div class='modal-header'>

                <h5 class='modal-title' id='exampleModalLabel'>Import Data Dari Excel</h5>

                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-server'>

                        <rect x='2' y='2' width='20' height='8' rx='2' ry='2'></rect>

                        <rect x='2' y='14' width='20' height='8' rx='2' ry='2'></rect>

                        <line x1='6' y1='6' x2='6' y2='6'></line>

                        <line x1='6' y1='18' x2='6' y2='18'></line>

                    </svg>

                </button>

            </div>

            <div class='modal-body'>
                <form method="POST" action="<?= site_url('pelanggan/excel') ?>" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="col-form-label text-md-left">Upload File</label>
                                        <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required>
                                        <div class="mt-1">
                                            <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                                        </div>
                                        <?= form_error('file', '<div class="text-danger">', '</div>') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <div class="form-group mb-0">
                            <button type="submit" name="import" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>