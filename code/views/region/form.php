<div class="container mt-5">
    <div class="card shadow col-md-6 mx-auto">
        <div class="card-header bg-primary text-white">
            <h4><?= isset($region) ? 'Edit Region' : 'Add New Region' ?></h4>
        </div>
        <div class="card-body">
            <form action="index.php?page=region&action=<?= isset($region) ? 'edit&id=' . $region['region_id'] : 'add' ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Region Name</label>
                    <input type="text" name="region_name" class="form-control" required value="<?= isset($region['region_name']) ? $region['region_name'] : '' ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Resident Professor</label>
                    <input type="text" name="professor" class="form-control" 
                           placeholder="e.g. Professor Oak" required
                           value="<?= isset($region['professor']) ? $region['professor'] : '' ?>">
                    <div class="form-text">Nama profesor yang memberikan starter Pokemon di region ini.</div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php?page=region" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
