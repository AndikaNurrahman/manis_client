    <!--  BEGIN CONTENT AREA  -->

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>

    <link href="<?= base_url(); ?>/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/plugins/dropify/dropify.min.css">
    <!--  BEGIN CONTENT AREA  -->

    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <form id="general-info" action="<?= base_url() ?>/settings/changeImage" class="section general-info" method="post" enctype="multipart/form-data">
                                    <div class="info">
                                        <h6 class="">Informasi Pengguna</h6>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                        <div class="upload mt-4 pr-md-4">
                                                            <input type="file" id="input-file-max-fs" name="filefoto" class="dropify" data-default-file="<?= base_url(); ?>/assets/img/<?php echo $user_image; ?>" data-max-file-size="2M" />
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="fullName">Full Name</label>
                                                                        <input type="text" class="form-control mb-4" id="fullName" placeholder="Full Name" value="<?= $user; ?>">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="profession">No HP</label>
                                                                <input type="text" class="form-control mb-4" id="profession" placeholder="Designer" value="628744645446">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <p> </p>
                                                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <!-- Content -->
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">




                <div class="education layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Ganti Password</h3>
                        <div class="timeline-alter">



                            <form action="changePassword" method="post">

                                <div class="form-group mb-4">
                                    <input type="password" class="form-control" name="chgpassword" id="chgpassword" placeholder="Password">
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php if ($_SESSION['role'] == 1) :
                ?>
                    <div class="work-experience layout-spacing ">

                        <div class="widget-content widget-content-area">

                            <h3 class="">MIKROTIK</h3>

                            <div class="timeline-alter">

                                <p>Connect Mikrotik</p>

                                <label class="switch s-icons s-outline s-outline-primary mr-2">
                                    <input name="connect" id="disable" type="checkbox" <?php if ($apicon == 1) {
                                                                                            echo "checked";
                                                                                        } ?>>
                                    <span class="slider round"> </span>
                                </label>

                                <form id="mikrotik" action="<?= base_url('settings/saveIP'); ?>" method="post">
                                    <div class="form-group mb-3">
                                        <input type="ip" class="form-control" id="ip" name="ipaddres" aria-describedby="emailHelp1" placeholder="IP address" value="<?= $ip; ?>" required>

                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="username" class="form-control" id="username" name="username" aria-describedby="username" placeholder="username" value="<?= $mkuser; ?>" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="password" class="form-control" name="password" id="sPassword" placeholder="Password" value="<?= $mkpass; ?>" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>

            </div>

            <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">



                <div class="bio layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Settings</h3>

                        <div class="bio-skill-box">

                            <div class="row">

                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                                    <div class="d-flex b-skills">
                                        <div>
                                        </div>
                                        <div class="">
                                            <h5>Tambah Admin</h5>

                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#registerModal">
                                                Tambah Admin
                                            </button>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                                    <div class="d-flex b-skills">
                                        <div>
                                        </div>
                                        <div class="">
                                            <h5>Api Payment Gateway</h5>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control" placeholder="Api Midtrans" aria-label="Api Midtrans">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">Save</button>
                                                </div>
                                            </div>
                                            <p>Jika tidak mempunyai api midtrans silahkan melakukan pendaftaran di <a href="https://midtrans.com" target="_blank">Midtrans</a> .</p>
                                        </div>
                                    </div>

                                </div>

                                
                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                                    <div class="d-flex b-skills">
                                        <div>
                                        </div>
                                        <div class="">
                                            <h5>Api Portal Pulsa</h5>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control" placeholder="Api key Portal Pulsa" aria-label="Api Portal Pulsa">
                                                                               
                                              
                                                <div class="input-group-append">
                                                       
                                                    <button class="btn btn-primary" type="button">Save</button>
                                                </div>
                                                </div>
                                        
                                            <div class="input-group mb-4">
                                             
                                                                               
                                                <input type="text" class="form-control" placeholder="Api secret key" aria-label="Api Portal Pulsa">
                                                <div class="input-group-append">
                                                       
                                                    <button class="btn btn-primary" type="button">Save</button>
                                                </div>
                                            </div>
                                            <p>Jika tidak mempunyai api Portal Pulsa silahkan melakukan pendaftaran di <a href="https://PortalPulsa.com" target="_blank">Portal Pulsa</a> .</p>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-0 ">

                                    <div class="d-flex b-skills">
                                        <div>
                                        </div>
                                        <div class="">
                                            <h5>Api Whatsapp Gateway</h5>
                                            <form method="POST" action="settings/savewablas">
                                                <div class="input-group mb-4">
                                                    <input type="text" class="form-control" placeholder="<?= $apiwa; ?>" aria-label="Api Wablas">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button">Save</button>
                                                    </div>
                                            </form>
                                            </br>

                                        </div>
                                        <p>Jika tidak mempunyai api wablas silahkan melakukan pendaftaran di <a href="https://wablas.com" target="_blank">Wablas</a> .</p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
    <!--  END CONTENT AREA  -->
    </div>

    <div class="modal fade register-modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header" id="registerModalLabel">
                    <h4 class="modal-title">Register</h4>
                    <?php echo validation_errors(); ?>
                    <?php
                    if ($this->session->flashdata('error') != '') {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $this->session->flashdata('error');
                        echo '</div>';
                    }
                    ?> <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('auth/add'); ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="nama">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Nama">
                        </div>
                        <label for="nama">Kepengurusan</label>
                        <select name="roleid" id="roleid" class='custom-select mb-4'>
                            <option name="roleid" value='2' selected>Admin</option>


                            <option name='roleid' id="roleid" value='1'>Super Admin</option>";
                            <option name='roleid' id="roleid" value='2'>Admin</option>";
                            <option name='roleid' id="roleid" value='3'>Customer Service</option>";
                            <option name='roleid' id="roleid" value='4'>Client</option>";

                        </select>
                        <button type="submit" class="btn btn-primary">Register</button>





                </div>

            </div>
        <?php endif; ?>
        <?php if ($apicon == 0) {
            echo "                    <script >
$('#mikrotik').hide();</script>";
        } ?>

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
        <script>
            $('.widget-content .message').on('click', function() {
                swal({
                    title: 'Saved succesfully',
                    padding: '2em'
                })
            })
        </script>
        <script>
            $("input[type='checkbox']").on("change", function(evt) {
                if ($(this).prop("checked")) {
                    $('#mikrotik').show();
                    var val = 1;
                } else {

                    var val = 0;
                    $('#mikrotik').hide();
                };
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("settings/connect"); ?>',
                    data: 'val= ' + val
                });
            });
        </script>
        <script src="<?= base_url(); ?>/plugins/notification/snackbar/snackbar.min.js"></script>
        <script src="<?= base_url(); ?>/plugins/dropify/dropify.min.js"></script>
        <script src="<?= base_url(); ?>/plugins/blockui/jquery.blockUI.min.js"></script>
        <script src="<?= base_url(); ?>/assets/js/users/account-settings.js"></script>