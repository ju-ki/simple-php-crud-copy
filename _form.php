<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <?php if($user['id']): ?>
                Update user: <b><?php echo $user['name'] ?></b>
                <?php else: ?>
                Create user
                <?php endif; ?>
            </h3>
        </div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="<?php echo $user['name'] ?>" class="form-control <?php echo $error['name'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $error['name'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" value="<?php echo $user['username'] ?>" class="form-control <?php echo $error['username'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $error['username'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="<?php echo $user['email'] ?>" class="form-control  <?php echo $error['email'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $error['email'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" value="<?php echo $user['phone'] ?>" class="form-control  <?php echo $error['phone'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $error['phone'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input name="website" value="<?php echo $user['website'] ?>" class="form-control  <?php echo $error['website'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $error['website'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>