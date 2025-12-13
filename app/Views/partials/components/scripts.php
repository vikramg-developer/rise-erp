    
<!-- Scroll To Top -->
<div class="scrollToTop">
    <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Scroll To Top -->

<!-- Jquery Cdn -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Popper JS -->
<script src="<?php echo base_url('assets/libs/@popperjs/core/umd/popper.min.js'); ?>"></script>

<!-- Bootstrap JS -->
<script src="<?php echo base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Defaultmenu JS -->
<script src="<?php echo base_url('assets/js/defaultmenu.min.js'); ?>"></script>

<!-- Node Waves JS-->
<script src="<?php echo base_url('assets/libs/node-waves/waves.min.js'); ?>"></script>

<!-- Sticky JS -->
<script src="<?php echo base_url('assets/js/sticky.js'); ?>"></script>

<!-- Simplebar JS -->
<script src="<?php echo base_url('assets/libs/simplebar/simplebar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/simplebar.js'); ?>"></script>

<!-- Color Picker JS -->
<script src="<?php echo base_url('assets/libs/@simonwep/pickr/pickr.es5.min.js'); ?>"></script>

<!-- JSVector Maps JS -->
<script src="<?php echo base_url('assets/libs/jsvectormap/js/jsvectormap.min.js'); ?>"></script>

<!-- Apex Charts JS -->
<script src="<?php echo base_url('assets/libs/apexcharts/apexcharts.min.js'); ?>"></script>

<!-- Custom JS -->
<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

<!-- Date & Time Picker JS -->
<script src="<?php echo base_url('assets/js/date&time_pickers.js'); ?>"></script>

<!-- FlatPickr CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css'); ?>">

<!-- Chartjs Chart JS -->
<script src="<?php echo base_url('assets/libs/chart.js/chart.min.js'); ?>"></script>

<!-- Custom-Switcher JS -->
<script src="<?php echo base_url('assets/js/custom-switcher.min.js'); ?>"></script>

<!-- Datatables Cdn -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Internal Datatables JS -->
<script src="<?php echo base_url('assets/js/datatables.js'); ?>"></script>

<!-- Select2 Cdn -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Internal Select-2.js -->
<script src="<?php echo base_url('assets/js/select2.js'); ?>"></script>

<!-- Prism JS -->
<script src="<?php echo base_url('assets/libs/prismjs/prism.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/prism-custom.js'); ?>"></script>

<!-- Toast JS -->
<script src="<?php echo base_url('assets/js/Toasts.js'); ?>"></script>

<!-- Form Validation JS -->
<script src="<?php echo base_url('assets/js/validation.js'); ?>"></script>

<!-- Modal JS -->
<script src="<?php echo base_url('assets/js/modal.js'); ?>"></script>

<!-- Flat Picker JS -->
<script src="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.js'); ?>"></script>

<!-- CRM Contacts JS -->
<script src="<?php echo base_url('assets/js/crm-contacts.js'); ?>"></script>

<!-- Sweetalerts JS -->
<script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/sweet-alerts.js'); ?>"></script>

<script>
    let csrfName = "<?= csrf_token() ?>";
    let csrfHash = "<?= csrf_hash() ?>";
    const BASE_URL = "<?= base_url() ?>";
</script>

<script src="<?php echo base_url('partials/js/alert.js'); ?>"></script>

<?php if (isset($jspath)): ?>
    <script src="<?php echo base_url('partials/js/') . $jspath . '.js'; ?>"></script>
<?php endif; ?>