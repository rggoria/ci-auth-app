<div class="container mt-4">
    <div class="card border-0 shadow-lg">
        <!-- Toast -->
        <?php $this->load->view('components/toast/error_toast'); ?>
        <?php $this->load->view('components/toast/success_toast'); ?>
        <!-- Main -->
        <div class="card-body p-4">
            <h5 class="card-title text-center mb-4">Welcome to our Authentication System</h5>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <p class="card-text text-center mb-4">Choose one of the following actions:</p>
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Login
                        </a>
                        <a href="#" class="btn btn-secondary btn-lg d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#signupModal">
                            <i class="bi bi-person-plus me-2"></i> Signup
                        </a>
                        <a href="#" class="btn btn-info btn-lg d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">
                            <i class="bi bi-question-circle me-2"></i> Forgot Password
                        </a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <?php $this->load->view('components/modal/login_modal') ?>
            <?php $this->load->view('components/modal/signup_modal') ?>
            <!-- Forgot Password Modal -->
            <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Your forgot password form goes here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="mt-3 text-center">Page Rendered approximately at: {elapsed_time}</p>
</div>

<script src="<?php echo base_url('assets/js/show_hide_password.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/auth.js'); ?>"></script>

<script>
    function submitLogin() {
        var form_data = {
            loginUser: $('#login_user').val(),
            loginPassword: $('#login_password').val(),
        };
        $.ajax({
            url: '<?php echo base_url("auth/login"); ?>',
            type: 'POST',
            data: form_data,
            success: function(response) {
                console.log(response)
                $('#login_user_error').html('');
                $('#login_password_error').html('');
                $('#responseToastErrorMessage').html('');
                $('#responseToastSuccessMessage').html('');
                if (response.valid === true) {
                    $('#login_user').val('');
                    $('#login_password').val('');
                    window.location.href = '<?php echo base_url("profile"); ?>';
                } else {
                    $('#login_user_error').html(response.loginUser);
                    $('#login_password_error').html(response.loginPassword);
                    var errorMessage = Array.isArray(response.message) ? response.message.join('<br>') : response.message;
                    $('#responseToastSuccessMessage').html('');
                    $('#responseToastErrorMessage').html(errorMessage);
                    $('#errorToast').toast('show');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }


    function submitSignup() {
        var form_data = {
            signupFirstname: $('#signup_firstname').val(),
            signupLastname: $('#signup_lastname').val(),
            signupUsername: $('#signup_username').val(),
            signupEmail: $('#signup_email').val(),
            signupBirthday: $('#signup_birthday').val(),
            signupPassword: $('#signup_password').val(),
        };
        $.ajax({
            url: '<?php echo base_url("auth/signup"); ?>',
            type: 'POST',
            data: form_data,
            success: function(response) {
                $('#signup_firstname_error').html('');
                $('#signup_lastname_error').html('');
                $('#signup_username_error').html('');
                $('#signup_email_error').html('');
                $('#signup_birthday_error').html('');
                $('#signup_password_error').html('');
                $('#responseToastErrorMessage').html('');
                $('#responseToastSuccessMessage').html('');
                if (response.valid === true) {
                    $('#signup_firstname').val('');
                    $('#signup_lastname').val('');
                    $('#signup_username').val('');
                    $('#signup_email').val('');
                    $('#signup_birthday').val('');
                    $('#signup_password').val('');
                    $('#responseToastSuccessMessage').html(response.message);
                    $('#successToast').toast('show');
                } else {
                    $('#signup_firstname_error').html(response.signupFirstname);
                    $('#signup_lastname_error').html(response.signupLastname);
                    $('#signup_username_error').html(response.signupUsername);
                    $('#signup_email_error').html(response.signupEmail);
                    $('#signup_birthday_error').html(response.signupBirthday);
                    $('#signup_password_error').html(response.signupPassword);
                    var errorMessage = Array.isArray(response.message) ? response.message.join('<br>') : response.message;
                    $('#responseToastErrorMessage').html(errorMessage);
                    $('#errorToast').toast('show');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>