<body class="form no-image-content">


    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Password Recovery</h1>
                        <p class="signup-link recovery">Masukan email anda</p>
                        
                        <?php
                                // Cek apakah terdapat session nama message
                                if ($this->session->flashdata('message')) { // Jika ada
                                    echo '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>'; // Tampilkan pesannya
                                } ?>
                                <form class="text-left" action="lupa" method="post">
                                    <div class="form">

                                        <div id="email-field" class="field-wrapper input">
                                            <div class="d-flex justify-content-between">
                                                <label for="email">EMAIL</label>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign">
                                                <circle cx="12" cy="12" r="4"></circle>
                                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                            </svg>
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                            <input id="email" name="email" type="text" class="form-control" value="<?= set_value('email') ?>" placeholder="Email">
                                        </div>

                                        <div class="d-sm-flex justify-content-between">

                                            <div class="field-wrapper">
                                                <button type="submit" class="btn btn-primary" value="">Reset</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>