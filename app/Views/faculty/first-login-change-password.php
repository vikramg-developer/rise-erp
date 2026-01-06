<?php if (session('logged_in') && session('is_first_login') == 1): ?>
<div class="modal fade" id="firstLoginModal"
     data-bs-backdrop="static"
     data-bs-keyboard="false">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Change Password (First Login)</h5>
            </div>

            <div class="modal-body">
                <form method="post" action="<?= base_url('change-password-first-login') ?>">

                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input type="password"
                               id="old_password"
                               name="password"
                               class="form-control"
                               required onkeyup="match_old_password();">
                        <small id="old_password_error" class="text-danger"></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password"
                               id="first_login_password"
                               name="password"
                               class="form-control"
                               required>
                        <small id="first_login_password_error" class="text-danger"></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password"
                               id="first_login_confirm_password"
                               name="confirm_password"
                               class="form-control"
                               required>
                        <small id="first_login_password_match"></small>
                    </div>

                    <button type="submit"
                            id="firstLoginSaveBtn"
                            class="btn btn-primary w-100"
                            disabled>
                        Update Password
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>
<?php endif; ?>

<script>
    function match_old_password(){
        let old_password = document.getElementById('old_password').value;
//        console.log(old_password);
        
        $.ajax({
            url: BASE_URL + 'faculty/check-old-password',
            type:'post',
            data:{
                old_password: old_password,
                [csrfName]: csrfHash
            },
            dataType:'json',
            success:function(response){
                console.log(response.message);
                csrfHash = response.csrfHash;
            }
        });
    }
    </script>
