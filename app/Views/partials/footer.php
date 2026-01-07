</div>
            <!-- End::app-content -->

            <!-- Start::main-modal -->
            <?= $this->include('partials/components/modal'); ?>
            <!-- End::main-modal -->

            <!-- Start::main-footer -->
            <?= $this->include('partials/components/footer'); ?>
            <!-- End::main-footer -->

        </div> 
        <!-- End Page -->          

        <!-- Start::main-scripts -->
        <?= $this->include('partials/components/scripts'); ?>
        <!-- End::main-scripts -->
 
        <!-- FIRST LOGIN MODAL -->
        <?= view('faculty/first-login-change-password') ?>

        <?php if (session('logged_in') && session('is_first_login') == 1): ?>
        <script>
            const FIRST_LOGIN = true;
        </script>
        <script src="<?= base_url('partials/js/faculty/change-password-first-login.js') ?>"></script>
        <?php endif; ?>

    </body>

</html>