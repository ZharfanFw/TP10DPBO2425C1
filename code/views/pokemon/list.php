<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Pokemon PC Storage</h1>
        <div>
            <a href="index.php?page=home" class="btn btn-secondary">Home</a>
            <a href="index.php?page=trainer" class="btn btn-warning">Trainers</a>
            <a href="index.php?page=pokemon&action=add" class="btn btn-primary">+ Add Pokemon</a>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Nickname</th>
                        <th>Species</th>
                        <th>Type</th>
                        <th>Trainer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pokemonList)): ?>
                        <?php foreach ($pokemonList as $idx => $p): ?>
                        <tr>
                            <td><?= $idx + 1 ?></td>
                            <td>
                                <img src="<?= $p['photo'] ? $p['photo'] : 'https://img.pokemondb.net/sprites/home/normal/bulbasaur.png' ?>" 
                                     alt="PokeImg" width="50" height="50" class="rounded-circle border">
                            </td>
                            <td class="fw-bold"><?= $p['nickname'] ?></td>
                            <td><?= $p['species'] ?></td>
                           <td>
                                <?php $color1 = $p['type1_color'] ?? '#6c757d'; ?>
                                <span class="badge rounded-pill" style="background-color: <?= $color1 ?>;">
                                    <?= $p['type1_name'] ?>
                                </span>

                                <?php if (!empty($p['type2_name'])): ?>
                                    <?php $color2 = $p['type2_color'] ?? '#6c757d'; ?>
                                    <span class="badge rounded-pill" style="background-color: <?= $color2 ?>;">
                                        <?= $p['type2_name'] ?>
                                    </span>
                                <?php endif; ?>
                            </td> 
                            <td><?= $p['trainer_name'] ?></td> <td>
                                <a href="index.php?page=pokemon&action=edit&id=<?= $p['pokemon_id'] ?>" 
                                   class="btn btn-sm btn-outline-success">Edit</a>
                                <a href="index.php?page=pokemon&action=delete&id=<?= $p['pokemon_id'] ?>" 
                                   onclick="return confirm('Yakin release pokemon ini?')"
                                   class="btn btn-sm btn-outline-danger">Release</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">PC Box is Empty!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
