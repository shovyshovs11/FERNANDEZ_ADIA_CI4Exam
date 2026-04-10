<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">Welcome, <?= esc($user['name']) ?>!</h1>
        <p class="lead">This is your dashboard. Use the navigation above to manage your records.</p>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Manage Records</h5>
                <p class="card-text">Create, view, edit, and delete records.</p>
                <a href="<?= base_url('records') ?>" class="btn btn-light">Go to Records</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Your Profile</h5>
                <p class="card-text">Email: <?= esc($user['email']) ?></p>
                <p class="card-text">User ID: <?= $user['user_id'] ?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>