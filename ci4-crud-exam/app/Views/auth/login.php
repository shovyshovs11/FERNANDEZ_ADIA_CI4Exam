<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Login</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('login') ?>" method="post">
                    <?= csrf_field() ?>
                    
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

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>

                <hr>
                <p class="text-center mb-0">Don't have an account? <a href="<?= base_url('register') ?>">Register here</a></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>