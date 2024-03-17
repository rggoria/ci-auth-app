<div class="container my-5">
    <div class="row">
        <!-- Profile Card -->
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <span class="d-flex justify-content-center"><img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-picture mb-3"></span>
                    <h5 class="card-title">User Information</h5>
                    <hr>    
                    <div class="d-flex justify-content-between mb-3">
                        <span><i class="bi bi-person-fill"></i> Username:</span>
                        <span><?= $user->username; ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span><i class="bi bi-person"></i> First Name:</span>
                        <span><?= $user->firstname; ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span><i class="bi bi-envelope"></i> Email:</span>
                        <span><?= $user->email; ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span><i class="bi bi-cake-fill"></i> Birthday:</span>
                        <span><?= $user->birthday; ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span><i class="bi bi-calendar-check"></i> Date Created:</span>
                        <span><?= $user->date_created; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Functions -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile Functions</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#" class="btn btn-primary">Edit Profile</a></li>
                        <li class="list-group-item"><a href="<?= site_url('profile/change_password'); ?>" class="btn btn-warning">Change Password</a></li>
                        <li class="list-group-item"><a href="<?= site_url('profile/logout'); ?>" class="btn btn-danger">Logout</a></li>
                    </ul>
                </div>
            </div>
            <!-- Recent Activity -->
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Recent Activity</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Posted a photo</li>
                        <li class="list-group-item">Liked a post</li>
                        <li class="list-group-item">Commented on a post</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>