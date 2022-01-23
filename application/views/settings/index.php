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
                                        <h6 class="">General Information</h6>
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

                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-5 ">
                                    <h3>Timezone</h3>
                                    <select class="form-control  basic">
                                        <option timeZoneId="1" gmtAdjustment="GMT-12:00" useDaylightTime="0" value="-12">(GMT-12:00) International Date Line West</option>
                                        <option timeZoneId="2" gmtAdjustment="GMT-11:00" useDaylightTime="0" value="-11">(GMT-11:00) Midway Island, Samoa</option>
                                        <option timeZoneId="3" gmtAdjustment="GMT-10:00" useDaylightTime="0" value="-10">(GMT-10:00) Hawaii</option>
                                        <option timeZoneId="4" gmtAdjustment="GMT-09:00" useDaylightTime="1" value="-9">(GMT-09:00) Alaska</option>
                                        <option timeZoneId="5" gmtAdjustment="GMT-08:00" useDaylightTime="1" value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
                                        <option timeZoneId="6" gmtAdjustment="GMT-08:00" useDaylightTime="1" value="-8">(GMT-08:00) Tijuana, Baja California</option>
                                        <option timeZoneId="7" gmtAdjustment="GMT-07:00" useDaylightTime="0" value="-7">(GMT-07:00) Arizona</option>
                                        <option timeZoneId="8" gmtAdjustment="GMT-07:00" useDaylightTime="1" value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                        <option timeZoneId="9" gmtAdjustment="GMT-07:00" useDaylightTime="1" value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
                                        <option timeZoneId="10" gmtAdjustment="GMT-06:00" useDaylightTime="0" value="-6">(GMT-06:00) Central America</option>
                                        <option timeZoneId="11" gmtAdjustment="GMT-06:00" useDaylightTime="1" value="-6">(GMT-06:00) Central Time (US & Canada)</option>
                                        <option timeZoneId="12" gmtAdjustment="GMT-06:00" useDaylightTime="1" value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                        <option timeZoneId="13" gmtAdjustment="GMT-06:00" useDaylightTime="0" value="-6">(GMT-06:00) Saskatchewan</option>
                                        <option timeZoneId="14" gmtAdjustment="GMT-05:00" useDaylightTime="0" value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                        <option timeZoneId="15" gmtAdjustment="GMT-05:00" useDaylightTime="1" value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
                                        <option timeZoneId="16" gmtAdjustment="GMT-05:00" useDaylightTime="1" value="-5">(GMT-05:00) Indiana (East)</option>
                                        <option timeZoneId="17" gmtAdjustment="GMT-04:00" useDaylightTime="1" value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                                        <option timeZoneId="18" gmtAdjustment="GMT-04:00" useDaylightTime="0" value="-4">(GMT-04:00) Caracas, La Paz</option>
                                        <option timeZoneId="19" gmtAdjustment="GMT-04:00" useDaylightTime="0" value="-4">(GMT-04:00) Manaus</option>
                                        <option timeZoneId="20" gmtAdjustment="GMT-04:00" useDaylightTime="1" value="-4">(GMT-04:00) Santiago</option>
                                        <option timeZoneId="21" gmtAdjustment="GMT-03:30" useDaylightTime="1" value="-3.5">(GMT-03:30) Newfoundland</option>
                                        <option timeZoneId="22" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3">(GMT-03:00) Brasilia</option>
                                        <option timeZoneId="23" gmtAdjustment="GMT-03:00" useDaylightTime="0" value="-3">(GMT-03:00) Buenos Aires, Georgetown</option>
                                        <option timeZoneId="24" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3">(GMT-03:00) Greenland</option>
                                        <option timeZoneId="25" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3">(GMT-03:00) Montevideo</option>
                                        <option timeZoneId="26" gmtAdjustment="GMT-02:00" useDaylightTime="1" value="-2">(GMT-02:00) Mid-Atlantic</option>
                                        <option timeZoneId="27" gmtAdjustment="GMT-01:00" useDaylightTime="0" value="-1">(GMT-01:00) Cape Verde Is.</option>
                                        <option timeZoneId="28" gmtAdjustment="GMT-01:00" useDaylightTime="1" value="-1">(GMT-01:00) Azores</option>
                                        <option timeZoneId="29" gmtAdjustment="GMT+00:00" useDaylightTime="0" value="0">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
                                        <option timeZoneId="30" gmtAdjustment="GMT+00:00" useDaylightTime="1" value="0">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
                                        <option timeZoneId="31" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                        <option timeZoneId="32" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                        <option timeZoneId="33" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                        <option timeZoneId="34" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                                        <option timeZoneId="35" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) West Central Africa</option>
                                        <option timeZoneId="36" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Amman</option>
                                        <option timeZoneId="37" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Athens, Bucharest, Istanbul</option>
                                        <option timeZoneId="38" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Beirut</option>
                                        <option timeZoneId="39" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Cairo</option>
                                        <option timeZoneId="40" gmtAdjustment="GMT+02:00" useDaylightTime="0" value="2">(GMT+02:00) Harare, Pretoria</option>
                                        <option timeZoneId="41" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                                        <option timeZoneId="42" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Jerusalem</option>
                                        <option timeZoneId="43" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Minsk</option>
                                        <option timeZoneId="44" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Windhoek</option>
                                        <option timeZoneId="45" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
                                        <option timeZoneId="46" gmtAdjustment="GMT+03:00" useDaylightTime="1" value="3">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                        <option timeZoneId="47" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">(GMT+03:00) Nairobi</option>
                                        <option timeZoneId="48" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">(GMT+03:00) Tbilisi</option>
                                        <option timeZoneId="49" gmtAdjustment="GMT+03:30" useDaylightTime="1" value="3.5">(GMT+03:30) Tehran</option>
                                        <option timeZoneId="50" gmtAdjustment="GMT+04:00" useDaylightTime="0" value="4">(GMT+04:00) Abu Dhabi, Muscat</option>
                                        <option timeZoneId="51" gmtAdjustment="GMT+04:00" useDaylightTime="1" value="4">(GMT+04:00) Baku</option>
                                        <option timeZoneId="52" gmtAdjustment="GMT+04:00" useDaylightTime="1" value="4">(GMT+04:00) Yerevan</option>
                                        <option timeZoneId="53" gmtAdjustment="GMT+04:30" useDaylightTime="0" value="4.5">(GMT+04:30) Kabul</option>
                                        <option timeZoneId="54" gmtAdjustment="GMT+05:00" useDaylightTime="1" value="5">(GMT+05:00) Yekaterinburg</option>
                                        <option timeZoneId="55" gmtAdjustment="GMT+05:00" useDaylightTime="0" value="5">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                                        <option timeZoneId="56" gmtAdjustment="GMT+05:30" useDaylightTime="0" value="5.5">(GMT+05:30) Sri Jayawardenapura</option>
                                        <option timeZoneId="57" gmtAdjustment="GMT+05:30" useDaylightTime="0" value="5.5">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                        <option timeZoneId="58" gmtAdjustment="GMT+05:45" useDaylightTime="0" value="5.75">(GMT+05:45) Kathmandu</option>
                                        <option timeZoneId="59" gmtAdjustment="GMT+06:00" useDaylightTime="1" value="6">(GMT+06:00) Almaty, Novosibirsk</option>
                                        <option timeZoneId="60" gmtAdjustment="GMT+06:00" useDaylightTime="0" value="6">(GMT+06:00) Astana, Dhaka</option>
                                        <option timeZoneId="61" gmtAdjustment="GMT+06:30" useDaylightTime="0" value="6.5">(GMT+06:30) Yangon (Rangoon)</option>
                                        <option timeZoneId="62" selected="selected" gmtAdjustment="GMT+07:00" useDaylightTime="0" value="7">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                        <option timeZoneId="63" gmtAdjustment="GMT+07:00" useDaylightTime="1" value="7">(GMT+07:00) Krasnoyarsk</option>
                                        <option timeZoneId="64" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                        <option timeZoneId="65" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Kuala Lumpur, Singapore</option>
                                        <option timeZoneId="66" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                        <option timeZoneId="67" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Perth</option>
                                        <option timeZoneId="68" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Taipei</option>
                                        <option timeZoneId="69" gmtAdjustment="GMT+09:00" useDaylightTime="0" value="9">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                        <option timeZoneId="70" gmtAdjustment="GMT+09:00" useDaylightTime="0" value="9">(GMT+09:00) Seoul</option>
                                        <option timeZoneId="71" gmtAdjustment="GMT+09:00" useDaylightTime="1" value="9">(GMT+09:00) Yakutsk</option>
                                        <option timeZoneId="72" gmtAdjustment="GMT+09:30" useDaylightTime="0" value="9.5">(GMT+09:30) Adelaide</option>
                                        <option timeZoneId="73" gmtAdjustment="GMT+09:30" useDaylightTime="0" value="9.5">(GMT+09:30) Darwin</option>
                                        <option timeZoneId="74" gmtAdjustment="GMT+10:00" useDaylightTime="0" value="10">(GMT+10:00) Brisbane</option>
                                        <option timeZoneId="75" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                                        <option timeZoneId="76" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10">(GMT+10:00) Hobart</option>
                                        <option timeZoneId="77" gmtAdjustment="GMT+10:00" useDaylightTime="0" value="10">(GMT+10:00) Guam, Port Moresby</option>
                                        <option timeZoneId="78" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10">(GMT+10:00) Vladivostok</option>
                                        <option timeZoneId="79" gmtAdjustment="GMT+11:00" useDaylightTime="1" value="11">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                                        <option timeZoneId="80" gmtAdjustment="GMT+12:00" useDaylightTime="1" value="12">(GMT+12:00) Auckland, Wellington</option>
                                        <option timeZoneId="81" gmtAdjustment="GMT+12:00" useDaylightTime="0" value="12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                        <option timeZoneId="82" gmtAdjustment="GMT+13:00" useDaylightTime="0" value="13">(GMT+13:00) Nuku'alofa</option>
                                    </select>

                                </div>

                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-0 ">

                                    <div class="d-flex b-skills">
                                        <div>
                                        </div>
                                        <div class="">
                                            <h5>Api Whatsapp Gateway</h5>
                                            <form method="POST" action="settings/savewablas">
                                                <div class="input-group mb-4">
                                                    <input type="text" class="form-control" placeholder="Api Wablas" aria-label="Api Wablas">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button">Save</button>
                                                    </div>
                                            </form>
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