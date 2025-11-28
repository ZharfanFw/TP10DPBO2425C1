<?php
// index.php

// 1. Debugging Error (Biar ketahuan kalau ada salah koding)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Load semua ViewModel
require_once 'viewmodels/PokemonViewModel.php';
require_once 'viewmodels/TrainerViewModel.php';
require_once 'viewmodels/RegionViewModel.php';
require_once 'viewmodels/TypeViewModel.php';

// 3. Ambil parameter URL
$page   = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';
$id     = isset($_GET['id']) ? $_GET['id'] : null;

// 4. Routing Switch Case
switch ($page) {
    case 'home':
        require_once 'views/template/header.php';
        include 'views/home.php';
        require_once 'views/template/footer.php';
        break;

    // --- CASE POKEMON ---
    case 'pokemon':
        $viewModel = new PokemonViewModel();
        if ($action == 'add') {
            $trainerVM = new TrainerViewModel();
            $typeVM = new TypeViewModel();
            $trainers = $trainerVM->getTrainerList();
            $types = $typeVM->getTypeList();
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $viewModel->addPokemon($_POST);
                header("Location: index.php?page=pokemon");
                exit;
            }
            
            require_once 'views/template/header.php'; // Header
            include 'views/pokemon/form.php';
            require_once 'views/template/footer.php'; // Footer

        } elseif ($action == 'edit') {
            $pokemon = $viewModel->getPokemonById($id);
            $trainerVM = new TrainerViewModel();
            $typeVM = new TypeViewModel();
            $trainers = $trainerVM->getTrainerList();
            $types = $typeVM->getTypeList();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $viewModel->updatePokemon($id, $_POST);
                header("Location: index.php?page=pokemon");
                exit;
            }
            
            require_once 'views/template/header.php'; // Header
            include 'views/pokemon/form.php';
            require_once 'views/template/footer.php'; // Footer

        } elseif ($action == 'delete') {
            $viewModel->deletePokemon($id);
            header("Location: index.php?page=pokemon");
            exit;
        } else {
            $pokemonList = $viewModel->getPokemonList();
            
            require_once 'views/template/header.php'; // Header
            include 'views/pokemon/list.php';
            require_once 'views/template/footer.php'; // Footer
        }
        break;

    // --- CASE TRAINER (FIXED: Added Header & Footer) ---
    case 'trainer':
        $viewModel = new TrainerViewModel();
        if ($action == 'add') {
            $regionVM = new RegionViewModel();
            $regions = $regionVM->getRegionList();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $viewModel->addTrainer($_POST);
                header("Location: index.php?page=trainer");
                exit;
            }
            
            require_once 'views/template/header.php';
            include 'views/trainer/form.php';
            require_once 'views/template/footer.php';
        
        } elseif ($action == 'delete') {
            $viewModel->deleteTrainer($id);
            header("Location: index.php?page=trainer");
            exit;
        } else {
            $trainerList = $viewModel->getTrainerList();
            
            require_once 'views/template/header.php';
            include 'views/trainer/list.php';
            require_once 'views/template/footer.php';
        }
        break;

    // --- CASE REGION (FIXED: Added Header & Footer) ---
    case 'region':
        $viewModel = new RegionViewModel();
        if ($action == 'add') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $viewModel->addRegion($_POST);
                header("Location: index.php?page=region");
                exit;
            }
            
            require_once 'views/template/header.php';
            include 'views/region/form.php';
            require_once 'views/template/footer.php';

        } elseif ($action == 'edit') {
            $region = $viewModel->getRegionById($id);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $viewModel->updateRegion($id, $_POST);
                header("Location: index.php?page=region");
                exit;
            }
            
            require_once 'views/template/header.php';
            include 'views/region/form.php';
            require_once 'views/template/footer.php';

        } elseif ($action == 'delete') {
            $viewModel->deleteRegion($id);
            header("Location: index.php?page=region");
            exit;
        } else {
            $regionList = $viewModel->getRegionList();
            
            require_once 'views/template/header.php';
            include 'views/region/list.php';
            require_once 'views/template/footer.php';
        }
        break;

    // --- CASE TYPE (FIXED: Added Header & Footer) ---
    case 'type':
        $viewModel = new TypeViewModel();
        if ($action == 'add') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $viewModel->addType($_POST);
                header("Location: index.php?page=type");
                exit;
            }
            
            require_once 'views/template/header.php';
            include 'views/type/form.php';
            require_once 'views/template/footer.php';

        } elseif ($action == 'edit') {
            $type = $viewModel->getTypeById($id);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $viewModel->updateType($id, $_POST);
                header("Location: index.php?page=type");
                exit;
            }
            
            require_once 'views/template/header.php';
            include 'views/type/form.php';
            require_once 'views/template/footer.php';

        } elseif ($action == 'delete') {
            $viewModel->deleteType($id);
            header("Location: index.php?page=type");
            exit;
        } else {
            $typeList = $viewModel->getTypeList();
            
            require_once 'views/template/header.php';
            include 'views/type/list.php';
            require_once 'views/template/footer.php';
        }
        break;

    // --- DEFAULT 404 ---
    default:
        require_once 'views/template/header.php'; // Biar 404-nya juga bagus
        echo "<div class='text-center mt-5'>";
        echo "<h1>404 Not Found</h1>";
        echo "<p>Halaman yang kamu cari tidak ada di Pokedex ini.</p>";
        echo "<a href='index.php?page=home' class='btn btn-primary'>Kembali ke Home</a>";
        echo "</div>";
        require_once 'views/template/footer.php';
        break;
}
?>
