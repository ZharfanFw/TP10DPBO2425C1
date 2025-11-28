<?php
require_once 'models/Pokemon.php';

class PokemonViewModel
{
    private $pokemonModel;

    public function __construct()
    {
        $this->pokemonModel = new Pokemon();
    }

    public function getPokemonList()
    {
        // Langsung return data dari Model (sesuai contoh modul)
        return $this->pokemonModel->getAll();
    }

    public function getPokemonById($id)
    {
        return $this->pokemonModel->getById($id);
    }

    public function addPokemon($data)
    {
        return $this->pokemonModel->create($data);
    }

    public function updatePokemon($id, $data)
    {
        return $this->pokemonModel->update($id, $data);
    }

    public function deletePokemon($id)
    {
        return $this->pokemonModel->delete($id);
    }
}
