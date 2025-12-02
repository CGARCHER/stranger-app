<?php

class CharacterApi
{
    private string $baseUrl;

    /**
     * Constructor del servicio que consulta la API REST.
     * Ejemplo de baseUrl:
     *   http://localhost:8080/characters
     */
    public function __construct(string $baseUrl)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    /**
     * Devuelve el listado completo de personajes.
     *
     * @return array lista de personajes o array vacío si hay error.
     */
    public function getAllCharacters(): array
    {
        $url = $this->baseUrl . '/list';
        $json = @file_get_contents($url);

        if ($json === false) {
            return [];
        }

        $data = json_decode($json, true);

        return is_array($data) ? $data : [];
    }

    /**
     * Devuelve la información de un personaje por ID.
     *
     * @param int $id identificador del personaje.
     * @return array|null datos del personaje o null si no existe.
     */
    public function getCharacterById(int $id): ?array
    {
        $url = $this->baseUrl . '/' . $id;
        $json = @file_get_contents($url);

        if ($json === false) {
            return null;
        }

        $data = json_decode($json, true);

        return is_array($data) ? $data : null;
    }
}
