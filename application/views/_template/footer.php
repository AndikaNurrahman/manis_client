   </div>
   <!-- END MAIN CONTAINER -->
   <script src="<?= base_url();?>/plugins/sweetalerts/sweetalert2.min.js"></script>
   <script src="<?= base_url();?>/assets/js/libs/jquery-3.1.1.min.js"></script>
   <script src="<?= base_url();?>/plugins/jquery-ui/jquery-ui.min.js"></script>
   <script src="<?= base_url();?>/plugins/apex/apexcharts.min.js"></script>
   <script src="<?= base_url();?>/assets/js/app.js"></script>
   <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
   <script>
    $(document).ready(function() {
        App.init();
    });    
</script>

<script src="<?= base_url();?>/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url();?>/bootstrap/js/bootstrap.min.js"></script>


<script src="<?= base_url();?>/plugins/table/datatable/datatables.js"></script>

<!-- END TODO LIST -->


</script>
<script src="assets/js/custom.js"></script>







<!-- END GLOBAL MANDATORY SCRIPTS -->
<script>        
    $('#default-ordering').DataTable( {
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "order": [[ 3, "desc" ]],
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 10,
        drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered mb-5'); }
    } );
</script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script>        
    $('#default-ordering1').DataTable( {
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "order": [[ 3, "desc" ]],
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 10,
        drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered mb-5'); }
    } );
</script>
<script >
    $(window).on("load",function(){
       $(".load_screen").fadeOut("slow");
   });


</script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->



<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= base_url();?>/assets/js/components/session-timeout/bootstrap-session-timeout.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script >
    var SessionTimeout=function() {
        var e=function() {
            $.sessionTimeout( {
                title:"Session Timeout Notification", 
                message:"Your session is about to expire.", 
                keepAliveUrl:"", 
                redirUrl:"<?php echo base_url('/auth/logout');?>", 
                logoutUrl:"<?php echo base_url('/auth/logout');?>", 
                warnAfter:600000, 
                redirAfter:1000000, 
                ignoreUserActivity:!0, 
                countdownMessage:"Redirecting in {timer}.", 
                countdownBar: !0
            }
            )
        };
        return {
            init:function() {
                e()
            }
        }
    }

    ();
    jQuery(document).ready(function() {
        SessionTimeout.init()
    }
    );
</script>
<!--  BEGIN CUSTOM SCRIPTS FILE  -->




<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>