<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Trainer Data</h1>
        <div>
            <a href="index.php?page=home" class="btn btn-secondary">Home</a>
            <a href="index.php?page=pokemon" class="btn btn-primary">Go to Pokemon</a>
            <a href="index.php?page=trainer&action=add" class="btn btn-success">+ New Trainer</a>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Trainer Name</th>
                        <th>Level</th>
                        <th>Region</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($trainerList)): ?>
                        <?php foreach ($trainerList as $idx => $t): ?>
                        <tr>
                            <td><?= $idx + 1 ?></td>
                            <td class="fw-bold"><?= $t['trainer_name'] ?></td>
                            <td><span class="badge bg-info text-dark">Lvl. <?= $t['level'] ?></span></td>
                            <td><?= $t['region_name'] ?></td> <td>
                                <a href="index.php?page=trainer&action=delete&id=<?= $t['trainer_id'] ?>" 
                                   onclick="return confirm('Hapus Trainer ini? Semua pokemon miliknya akan ikut terhapus!')"
                                   class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data Trainer.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
