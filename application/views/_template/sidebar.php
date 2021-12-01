  <div class="main-container sidebar-closed sbar-open" id="container">

      <div class="overlay"></div>
      <div class="cs-overlay"></div>
      <div class="search-overlay"></div>

      <div class="sidebar-wrapper sidebar-theme">

          <nav id="sidebar">

              <ul class="navbar-nav theme-brand flex-row  text-center">
                  <li class="nav-item theme-logo">
                      <a href="index.html">
                          <img src="<?= base_url(); ?>/assets/img/<?= $user_image; ?>" class="navbar-logo" alt="logo">
                      </a>
                  </li>
                  <li class="nav-item theme-text">
                      <a href="<?= base_url(); ?>" class="nav-link"> Manis</a>
                  </li>
              </ul>

              <ul class="list-unstyled menu-categories" id="accordionExample">
                  <?php if ($_SESSION['role'] == 1) :

                    ?>
                      <li class="menu <?php if ($title == 'Dashboard') {
                                            echo ('active');
                                        }; ?>">
                          <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                      <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                      <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                  </svg>
                                  <span>Dashboard</span>
                              </div>
                              <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                      <polyline points="9 18 15 12 9 6"></polyline>
                                  </svg>
                              </div>
                          </a>
                          <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#accordionExample">
                              <li>
                                  <a href="<?= base_url(); ?>"> Dashboard</a>
                              </li>
                              <li>
                                  <a href=""> Mikrotik Info </a>
                              </li>
                          </ul>
                      </li>

                      <li class="menu menu-heading">
                          <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                  <circle cx="12" cy="12" r="10"></circle>
                              </svg><span>Pelanggan</span></div>
                      </li>


                      <li class="menu <?php if ($this->uri->segment(1)=='pelanggan' || $this->uri->segment(1)=='paket') {
                                            echo ('active');
                                        }; ?>">
                          <a href="#pelanggan" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                      <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                      <circle cx="9" cy="7" r="4"></circle>
                                      <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                      <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                  </svg>
                                  <span>Pelanggan</span>
                              </div>
                              <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                      <polyline points="9 18 15 12 9 6"></polyline>
                                  </svg>
                              </div>
                          </a>
                          <ul class="collapse submenu list-unstyled" id="pelanggan" data-parent="#accordionExample">
                              <li class="<?php if ($title == 'Pelanggan') {
                                                echo ('active');
                                            }; ?>">
                                  <a href="<?= base_url('/pelanggan'); ?>"> Pelanggan </a>
                              </li>
                              <li class="<?php if ($title == 'Tambah') {
                                                echo ('active');
                                            }; ?>">
                                  <a href="<?= base_url('/pelanggan/tambah'); ?>"> Tambah Pelanggan </a>
                              </li>
                              <li class="<?php if ($title == 'Paket') {
                                                echo ('active');
                                            }; ?>">
                                  <a href="<?= base_url('/paket'); ?>   "> Paket </a>
                              </li>
                          </ul>
                      </li>


                      <li class="menu <?php if ($this->uri->segment(1)=='text') {
                                            echo ('active');
                                        }; ?>">
                          <a href="#inbox" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                                      <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                  </svg>
                                  <span>Chat Whatsapp</span>
                              </div>
                              <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                      <polyline points="9 18 15 12 9 6"></polyline>
                                  </svg>
                              </div>
                          </a>
                          <ul class="collapse submenu list-unstyled" id="inbox" data-parent="#accordionExample">
                              <li>
                                  <a href="<?= base_url('/text'); ?>"> Inbox</a>
                              </li>
                              <li>
                                  <a href="<?= base_url('/text/template'); ?>"> Template Pesan </a>
                              </li>
                              <li>
                                  <a href="<?= base_url('/text/send'); ?>"> Kirim ke Semua </a>
                              </li>
                          </ul>
                      </li>






                      <li class="menu menu-heading">
                          <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                  <circle cx="12" cy="12" r="10"></circle>
                              </svg><span>Tagihan</span></div>
                      </li>

                      <li class="menu <?php if ($title == 'Tagihan') {
                                            echo ('active');
                                        }; ?>">
                          <a href="#tagihan" <?php if ($title == 'Tagihan') {
                                                    echo ('aria-expanded="true"');
                                                }; ?> data-toggle="collapse" class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                      <line x1="12" y1="1" x2="12" y2="23"></line>
                                      <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                  </svg>
                                  <span>Tagihan</span>
                              </div>
                              <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                      <polyline points="9 18 15 12 9 6"></polyline>
                                  </svg>
                              </div>
                          </a>

                          <ul class="collapse submenu list-unstyled" id="tagihan" data-parent="#accordionExample">
                              <li>
                                  <a href="<?= base_url('/pembayaran'); ?>">Tagihan</a>
                              </li>
                              <li>
                                  <a href="<?= base_url('/Print'); ?>">Print</a>
                              </li>
                              <li>
                                  <a href="<?= base_url('tagihan/generate'); ?>"> Generate Tagihan </a>
                              </li>
                          </ul>
                      </li>


                      </li>

                      <li class="menu <?php if ($title == 'Transaksi') {
                                            echo ('active');
                                        }; ?>">
                          <a href="<?= base_url('/Transaksi'); ?>" <?php if ($title == 'Transaksi') {
                                                                        echo ('aria-expanded="true"');
                                                                    }; ?> class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                                      <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                      <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                      <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                  </svg>
                                  <span>Transaksi</span>
                              </div>

                          </a>
                      </li>



                      <li class="menu menu-heading">
                          <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                  <circle cx="12" cy="12" r="10"></circle>
                              </svg><span>Systems</span></div>
                      </li>

                      <li class="menu">
                          <a href="<?= base_url('/settings'); ?>" aria-expanded="false" class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay">
                                      <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                                      <polygon points="12 15 17 21 7 21 12 15"></polygon>
                                  </svg>
                                  <span> Setting </span>
                              </div>
                          </a>
                      </li>




                  <?php endif; ?>
                  <?php if ($_SESSION['role'] == 4) :

                    ?>
                      <li class="menu <?php if ($title == 'Dashboard') {
                                            echo ('active');
                                        }; ?>">
                          <a href="<?= base_url('/Dashboard'); ?>" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                      <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                      <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                  </svg>
                                  <span>Dashboard</span>
                              </div>
                          </a>
                      </li>
                      <li class="menu menu-heading">
                          <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                  <circle cx="12" cy="12" r="10"></circle>
                              </svg><span>Tagihan dan Pulsa</span></div>
                      </li>
                      <li class="menu <?php if ($title == 'Tagihan Anda') {
                                            echo ('active');
                                        }; ?>">
                          <a href="<?= base_url('/users/tagihan'); ?>" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                      <line x1="12" y1="1" x2="12" y2="23"></line>
                                      <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                  </svg>
                                  <span>Tagihan</span>
                              </div>
                          </a>
                      </li>
                      <li class="menu <?php if ($title == 'Konter') {
                                            echo ('active');
                                        }; ?>">
                          <a href="<?= base_url('/konter'); ?>" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap">
                                      <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                                  </svg>
                                  <span>Pulsa Token Game</span>
                              </div>
                          </a>
                      </li>
                      <li class="menu menu-heading">
                          <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                  <circle cx="12" cy="12" r="10"></circle>
                              </svg><span>Systems</span></div>
                      </li>

                      <li class="menu">
                          <a href="<?= base_url('/settings'); ?>" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay">
                                      <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                                      <polygon points="12 15 17 21 7 21 12 15"></polygon>
                                  </svg>
                                  <span> Setting </span>
                              </div>
                          </a>
                      </li>
                  <?php endif; ?>
      </div>
      <!--  END SIDEBAR  -->