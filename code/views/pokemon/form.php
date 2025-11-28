<div class="container mt-5">
    <div class="card shadow col-md-8 mx-auto">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= isset($pokemon) ? 'Edit Pokemon Data' : 'Add New Pokemon' ?></h4>
        </div>
        <div class="card-body">
            
            <form action="index.php?page=pokemon&action=<?= isset($pokemon) ? 'edit&id=' . $pokemon['pokemon_id'] : 'add' ?>" method="POST">
                
                <div class="mb-3">
                    <label class="form-label">Nickname</label>
                    <input type="text" name="nickname" class="form-control" required 
                           placeholder="e.g. PikaPika"
                           value="<?= isset($pokemon['nickname']) ? $pokemon['nickname'] : '' ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Species</label>
                    <input type="text" name="species" class="form-control" required 
                           placeholder="e.g. Pikachu"
                           value="<?= isset($pokemon['species']) ? $pokemon['species'] : '' ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Photo URL</label>
                    <input type="text" name="photo" class="form-control" 
                           placeholder="https://link-gambar.com/gambar.png"
                           value="<?= isset($pokemon['photo']) ? $pokemon['photo'] : '' ?>">
                    <div class="form-text">Biarkan kosong untuk pakai foto default.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Trainer (Owner)</label>
                    <select name="trainer_id" class="form-select" required>
                        <option value="">-- Select Trainer --</option>
                        <?php foreach ($trainers as $t): ?>
                            <option value="<?= $t['trainer_id'] ?>" 
                                <?= (isset($pokemon) && $pokemon['trainer_id'] == $t['trainer_id']) ? 'selected' : '' ?>>
                                <?= $t['trainer_name'] ?> (Level <?= $t['level'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Primary Type</label>
                    <select name="type_id" class="form-select" required>
                        <option value="">-- Select Main Type --</option>
                        <?php foreach ($types as $type): ?>
                            <option value="<?= $type['type_id'] ?>" 
                                <?= (isset($pokemon) && $pokemon['type_id'] == $type['type_id']) ? 'selected' : '' ?>>
                                <?= $type['type_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Secondary Type (Optional)</label>
                    <select name="type_id_2" class="form-select">
                        <option value="">-- None --</option>
                        <?php foreach ($types as $type): ?>
                            <option value="<?= $type['type_id'] ?>" 
                                <?= (isset($pokemon) && $pokemon['type_id_2'] == $type['type_id']) ? 'selected' : '' ?>>
                                <?= $type['type_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>                

                <div class="d-flex justify-content-between mt-4">
                    <a href="index.php?page=pokemon" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Save to PC Box</button>
                </div>

            </form>
        </div>
    </div>
</div>
