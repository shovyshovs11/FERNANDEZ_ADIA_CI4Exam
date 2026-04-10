<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0">Register</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('register') ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control <?= isset($validation) && $validation->hasError('name') ? 'is-invalid' : '' ?>" 
                               id="name" name="name" value="<?= old('name') ?>" required>
                        <?php if (isset($validation) && $validation->hasError('name')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('name') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : '' ?>" 
                               id="email" name="email" value="<?= old('email') ?>" required>
                        <?php if (isset($validation) && $validation->hasError('email')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>" 
                               id="password" name="password" required>
                        <?php if (isset($validation) && $validation->hasError('password')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control <?= isset($validation) && $validation->hasError('password_confirm') ? 'is-invalid' : '' ?>" 
                               id="password_confirm" name="password_confirm" required>
                        <?php if (isset($validation) && $validation->hasError('password_confirm')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('password_confirm') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
                </form>

                <hr>
                <p class="text-center mb-0">Already have an account? <a href="<?= base_url('login') ?>">Login here</a></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>