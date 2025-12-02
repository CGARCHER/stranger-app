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
 * @return array|null
 *   - array con personajes si todo va bien
 *   - array vacío si la API responde pero no hay datos
 *   - null si hay un error real (no conecta, JSON inválido, etc.)
 */
public function getAllCharacters(): ?array
{
    $url = $this->baseUrl . '/list';
    $json = @file_get_contents($url);

    // Si no se puede conectar a la API → error real
    if ($json === false) {
        echo "Probable error de conexión con la API";
    }

    $data = json_decode($json, true);

    // Si llega aquí significa que la API respondió bien (aunque devuelva [])
    return $data;
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
