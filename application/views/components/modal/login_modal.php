<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-box-arrow-in-right me-2"></i> Login User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="login_user" class="col-form-label">Username/Email:</label>
                    <input type="text" class="form-control" id="login_user" placeholder="Enter username or email...">
                    <div id="login_user_error" class="text-danger sup"></div>
                </div>
                <div class="mb-3">
                    <label for="login_password" class="col-form-label">Password:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="login_password" placeholder="Enter password...">
                        <button class="btn btn-outline-secondary" type="button" id="toggleLoginPassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div id="login_password_error" class="text-danger sup"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitLogin()">Submit</button>
            </div>
        </div>
    </div>
</div>