<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Region Data</h1>
        <div>
            <a href="index.php?page=home" class="btn btn-secondary">Home</a>
            <a href="index.php?page=region&action=add" class="btn btn-success">+ New Region</a>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Region Name</th>
                        <th>Resident Professor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($regionList as $r): ?>
                    <tr>
                        <td><?= $r['region_id'] ?></td>
                        <td><?= $r['region_name'] ?></td>
                        <td><?= $r['professor'] ?></td>
                        <td>
                            <a href="index.php?page=region&action=edit&id=<?= $r['region_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="index.php?page=region&action=delete&id=<?= $r['region_id'] ?>" onclick="return confirm('Delete this region?')" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
