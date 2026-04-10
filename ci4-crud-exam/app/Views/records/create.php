<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Create New Record</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('records/store') ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control <?= isset($validation) && $validation->hasError('title') ? 'is-invalid' : '' ?>" 
                               id="title" name="title" value="<?= old('title') ?>" required>
                        <?php if (isset($validation) && $validation->hasError('title')): ?>
                            <div class="text-danger"><?= $validation->getError('title') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"><?= old('description') ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" value="<?= old('category') ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-select <?= isset($validation) && $validation->hasError('status') ? 'is-invalid' : '' ?>" 
                                    id="status" name="status" required>
                                <option value="pending" <?= old('status') === 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="active" <?= old('status') === 'active' ? 'selected' : '' ?>>Active</option>
                                <option value="inactive" <?= old('status') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="priority" class="form-label">Priority (1-5) *</label>
                            <input type="number" class="form-control <?= isset($validation) && $validation->hasError('priority') ? 'is-invalid' : '' ?>" 
                                   id="priority" name="priority" value="<?= old('priority') ?? 1 ?>" min="1" max="5" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('records') ?>" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>