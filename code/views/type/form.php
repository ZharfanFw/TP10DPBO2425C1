<div class="container mt-5">
    <div class="card shadow col-md-6 mx-auto">
        <div class="card-header bg-primary text-white">
            <h4><?= isset($type) ? 'Edit Elemental Type' : 'Add New Type' ?></h4>
        </div>
        <div class="card-body">
            <form action="index.php?page=type&action=<?= isset($type) ? 'edit&id=' . $type['type_id'] : 'add' ?>" method="POST">
                
                <div class="mb-3">
                    <label class="form-label">Type Name</label>
                    <input type="text" name="type_name" class="form-control" 
                           placeholder="e.g. Fairy" required
                           value="<?= isset($type['type_name']) ? $type['type_name'] : '' ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Badge Color</label>
                    <input type="color" name="badge_color" class="form-control form-control-color w-100" 
                           value="<?= isset($type['badge_color']) ? $type['badge_color'] : '#563d7c' ?>" 
                           title="Choose your color">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="index.php?page=type" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Save Type</button>
                </div>

            </form>
        </div>
    </div>
</div>
