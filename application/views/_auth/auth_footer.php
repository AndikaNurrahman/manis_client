    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url();?>/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url();?>/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url();?>/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url();?>/assets/js/authentication/form-2.js"></script>
    <script src="<?= base_url();?>/assets/js/scrollspyNav.js"></script>
          <script>
var form = document.getElementsByName("logins")[0];
$("input[type='checkbox']").on( "change", function(evt) {
 if($(this).prop("checked")) {

 form.action = "<?=base_url()?>/auth/login";
    } else {
    
 form.action = "<?=base_url()?>/auth/loginclient";
  };
 
});
</script>
</body>
</html>