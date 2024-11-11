<?php

namespace App\Views\Admin\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
        public static function render($data = null)
        {

?>

                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer text-center">
                        Copyright &copy; by Chihihi
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Wrapper -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- All Jquery -->
                <!-- ============================================================== -->
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery/dist/jquery.min.js"></script>
                <!-- Bootstrap tether Core JavaScript -->
                <script src="<?=APP_URL?>/public/assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/sparkline/sparkline.js"></script>
                <!--Wave Effects -->
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/waves.js"></script>
                <!--Menu sidebar -->
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/sidebarmenu.js"></script>
                <!--Custom JavaScript -->
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/custom.min.js"></script>
                <!--This page JavaScript -->
                <!-- <script src="<?=APP_URL?>/public/assets/admin/dist/js/pages/dashboards/dashboard1.js"></script> -->
                <!-- Charts js Files -->
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/excanvas.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.pie.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.time.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.stack.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.crosshair.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/pages/chart/chart-page-init.js"></script>

                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/multicheck/datatable-checkbox-init.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/multicheck/jquery.multicheck.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/DataTables/datatables.min.js"></script>
                <script>
                        /****************************************
                         *       Basic Table                   *
                         ****************************************/
                        $('#zero_config').DataTable();
                </script>

                <script src="<?=APP_URL?>/public/assets/admin/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/pages/mask/mask.init.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/select2/dist/js/select2.full.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/select2/dist/js/select2.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/quill/dist/quill.min.js"></script>


                </script>


                </body>

                </html>
<?php
        }
}

?>