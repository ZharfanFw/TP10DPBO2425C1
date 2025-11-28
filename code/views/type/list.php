<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Elemental Types</h1>
        <div>
            <a href="index.php?page=home" class="btn btn-secondary">Home</a>
            <a href="index.php?page=type&action=add" class="btn btn-success">+ New Type</a>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Type Name</th>
                        <th>Badge Preview</th>
                        <th>Color Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($typeList)): ?>
                        <?php foreach ($typeList as $t): ?>
                        <tr>
                            <td><?= $t['type_id'] ?></td>
                            <td class="fw-bold"><?= $t['type_name'] ?></td>
                            <td>
                                <span class="badge rounded-pill" style="background-color: <?= $t['badge_color'] ?>; font-size: 1em; padding: 8px 15px;">
                                    <?= $t['type_name'] ?>
                                </span>
                            </td>
                            <td><code><?= $t['badge_color'] ?></code></td>
                            <td>
                                <a href="index.php?page=type&action=edit&id=<?= $t['type_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="index.php?page=type&action=delete&id=<?= $t['type_id'] ?>" 
                                   onclick="return confirm('Hapus Type ini?')"
                                   class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center">No types found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
