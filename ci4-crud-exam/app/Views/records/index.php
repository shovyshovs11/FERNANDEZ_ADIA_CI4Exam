<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Records</h1>
    <a href="<?= base_url('records/create') ?>" class="btn btn-primary">+ Create New Record</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($records)): ?>
                        <tr>
                            <td colspan="7" class="text-center">No records found.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?= $record['id'] ?></td>
                            <td>
                                <a href="<?= base_url('records/show/' . $record['id']) ?>" class="text-decoration-none">
                                    <?= esc($record['title']) ?>
                                </a>
                            </td>
                            <td><?= esc($record['category']) ?: 'N/A' ?></td>
                            <td>
                                <span class="badge bg-<?= $record['status'] === 'active' ? 'success' : ($record['status'] === 'inactive' ? 'secondary' : 'warning') ?>">
                                    <?= ucfirst($record['status']) ?>
                                </span>
                            </td>
                            <td><?= $record['priority'] ?></td>
                            <td><?= date('M d, Y', strtotime($record['created_at'])) ?></td>
                            <td>
                                <a href="<?= base_url('records/edit/' . $record['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('records/delete/' . $record['id']) ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>