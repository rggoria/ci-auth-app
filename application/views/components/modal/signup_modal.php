<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-plus me-2"></i> Signup User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="signup_firstname" class="col-form-label">First Name:</label><span id="bro"></span>
                        <input type="text" class="form-control" id="signup_firstname" placeholder="Enter first name...">
                        <div id="signup_firstname_error" class="text-danger sup"></div>
                    </div>
                    <div class="mb-3">
                        <label for="signup_lastname" class="col-form-label">Last Name:</label>
                        <input type="text" class="form-control" id="signup_lastname" placeholder="Enter last name...">
                        <div id="signup_lastname_error" class="text-danger sup"></div>
                    </div>
                    <div class="mb-3">
                        <label for="signup_username" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="signup_username" placeholder="Enter username...">
                        <div id="signup_username_error" class="text-danger sup"></div>
                    </div>
                    <div class="mb-3">
                        <label for="signup_email" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="signup_email" placeholder="Enter email...">
                        <div id="signup_email_error" class="text-danger sup"></div>
                    </div>
                    <div class="mb-3">
                        <label for="signup_birthday" class="col-form-label">Birthday:</label>
                        <input type="date" class="form-control" id="signup_birthday">
                        <div id="signup_birthday_error" class="text-danger sup"></div>
                    </div>
                    <div class="mb-3">
                        <label for="signup_password" class="col-form-label">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="signup_password" placeholder="Enter password...">
                            <button class="btn btn-outline-secondary" type="button" id="toggleSignupPassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <div id="signup_password_error" class="text-danger sup"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitSignup()">Submit</button>
            </div>
        </div>
    </div>
</div>