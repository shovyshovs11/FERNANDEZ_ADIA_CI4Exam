<?php
/**
 * @var array $record
 */
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Record Details</h4>
                <span class="badge bg-light text-dark">#<?= esc((string)($record['id'] ?? '')) ?></span>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Title:</dt>
                    <dd class="col-sm-9"><?= esc((string)($record['title'] ?? '')) ?></dd>

                    <dt class="col-sm-3">Description:</dt>
                    <dd class="col-sm-9">
                        <?php 
                        $description = (string)($record['description'] ?? '');
                        echo $description ? nl2br(esc($description)) : 'No description';
                        ?>
                    </dd>

                    <dt class="col-sm-3">Category:</dt>
                    <dd class="col-sm-9">
                        <?php 
                        $category = (string)($record['category'] ?? '');
                        echo $category ? esc($category) : 'Uncategorized';
                        ?>
                    </dd>

                    <dt class="col-sm-3">Status:</dt>
                    <dd class="col-sm-9">
                        <?php 
                        $status = (string)($record['status'] ?? 'pending');
                        $badgeClass = $status === 'active' ? 'success' : ($status === 'inactive' ? 'secondary' : 'warning');
                        ?>
                        <span class="badge bg-<?= $badgeClass ?>">
                            <?= ucfirst($status) ?>
                        </span>
                    </dd>

                    <dt class="col-sm-3">Priority:</dt>
                    <dd class="col-sm-9"><?= (int)($record['priority'] ?? 1) ?>/5</dd>

                    <dt class="col-sm-3">Created:</dt>
                    <dd class="col-sm-9"><?= !empty($record['created_at']) ? date('F d, Y H:i', strtotime($record['created_at'])) : 'N/A' ?></dd>

                    <dt class="col-sm-3">Updated:</dt>
                    <dd class="col-sm-9"><?= !empty($record['updated_at']) ? date('F d, Y H:i', strtotime($record['updated_at'])) : 'N/A' ?></dd>
                </dl>

                <hr>
                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('records') ?>" class="btn btn-secondary">← Back to List</a>
                    <div>
                        <a href="<?= base_url('records/edit/' . (int)($record['id'] ?? 0)) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('records/delete/' . (int)($record['id'] ?? 0)) ?>" 
                           class="btn btn-danger" 
                           onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>