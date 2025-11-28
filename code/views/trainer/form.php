<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Register New Trainer</h4>
                </div>
                <div class="card-body">
                    <form action="index.php?page=trainer&action=add" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label">Trainer Name</label>
                            <input type="text" name="trainer_name" class="form-control" required placeholder="e.g. Ash Ketchum">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <input type="number" name="level" class="form-control" required value="1" min="1" max="100">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Home Region</label>
                            <select name="region_id" class="form-select" required>
                                <option value="">-- Select Region --</option>
                                <?php foreach ($regions as $r): ?>
                                    <option value="<?= $r['region_id'] ?>"><?= $r['region_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="index.php?page=trainer" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Register Trainer</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
