<footer class="footer">

<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/toaster.min.js"></script>

<?php
    if (isset($_GET['typ'])) {
?>
<script>

                    toastr[<?php echo $_GET['typ']?>](<?php echo $_GET['msg']?>)

                    toastr.options = {
                      "closeButton": false,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": false,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "900",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
</script>
<?php
    }

?>
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="https://www.kuushtech.com/" target="_blank">Kabila Haile</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Developed by Kabila Haile</span>
    </div>
</footer>