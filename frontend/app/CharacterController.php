<?php

require_once __DIR__ . '/CharacterApi.php';

/**
 * Controlador para gestionar la lógica de presentación de personajes.
 */
class CharacterController
{
    private CharacterApi $api;

    /**
     * @param CharacterApi $api servicio para consultar la API REST.
     */
    public function __construct(CharacterApi $api)
    {
        $this->api = $api;
    }

    /**
     * Muestra el listado de personajes en formato cuadrícula.
     */
    public function listCharactersGrid(): void
    {
        $characters = $this->api->getAllCharacters();
        include_once('view/characters_grid.php');
    }

    /**
     * (Opcional) Muestra el listado clásico en tabla.
     */
    public function listCharacters(): void
    {
        $characters = $this->api->getAllCharacters();
        include __DIR__ . '/view/characters_list.php';
    }

    /**
     * Muestra el detalle de un personaje concreto.
     * @param int $id identificador del personaje.
     */
    public function showCharacter(int $id): void
    {
        $character = $this->api->getCharacterById($id);
        include __DIR__ . '/view/character_detail.php';
    }
}
