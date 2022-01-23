<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm expand-header">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg></a>

        <ul class="navbar-item flex-row ml-auto">
            <li class="nav-item dropdown notification-dropdown show">

                <a href="javascript:void(0);" class="nav-link dropdown-toggle dropdownaseek" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg><span class="badge badge-danger counter"></span>

                </a>

                <div class="dropdown-menu position-absolute e-animated e-fadeInUp dropdownaseeks" aria-labelledby="notificationDropdown">
                    <div class="notification-scroll">

                    </div>
                </div>

            </li>
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user " id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <polyline points="17 11 19 13 23 9"></polyline>
                    </svg>
                </a>
                <div class="dropdown-menu position-absolute e-animated e-fadeInUp" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <img src="<?= base_url(); ?>/assets/img/<?= $user_image; ?>" class="img-fluid mr-2" alt="avatar">
                            <div class="media-body">
                                <h5><?= substr($user, 0, 6); ?></h5>
                                <p>User</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <a href="<?= base_url(); ?>/setting">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg> <span>Settings</span>
                        </a>
                    </div>


                    <div class="dropdown-item">
                        <a href="<?= base_url('/auth/logout'); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg> <span>Log Out</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>
<script>
    var loaded = false;
    $(document).ready(function() {
        // updating the view with notifications using ajax
        function load_unseen_notification(view = '') {
            $.ajax({
                url: "<?= base_url('fetch') ?>",
                method: "POST",
                data: {
                    view: view
                },
                dataType: "json",
                success: function(data) {
                    $('.dropdownaseeks').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('.counter').html(data.unseen_notification);
                    }
                }
            });
        }

        // submit form and get new records

        // load new notifications
        $(document).on('click', '.dropdownaseek', function() {
            $('.counter').html('');
            load_unseen_notification('yes');
        });
        setInterval(function() {
            load_unseen_notification();;
        }, 5000);
    });
</script>