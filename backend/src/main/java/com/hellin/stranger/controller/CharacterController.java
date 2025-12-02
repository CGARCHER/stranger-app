package com.hellin.stranger.controller;

import java.util.List;
import java.util.Optional;

import org.springframework.web.bind.annotation.*;

import com.hellin.stranger.model.Character;
import com.hellin.stranger.repository.CharacterRepository;

@RestController
@RequestMapping("/characters")
/**
 * En este controlador se exponen todos los endpoints referentes a Characters {@link Character}
 * @version 1.0
 * Autor: [Tu Nombre]
 */
public class CharacterController {

    private CharacterRepository characterRepository;

    /**
     * Constructor del controlador REST.
     * @param characterRepository Repositorio para consultar la información en BD.
     */
    public CharacterController(CharacterRepository characterRepository) {
        this.characterRepository = characterRepository;
    }

    /**
     * Este método devuelve el listado completo de personajes.
     * @return List<Character> información de cada personaje.
     */
    @GetMapping("/list")
    public List<Character> listAll(){
        return characterRepository.findAll();
    }

    /**
     * Este método busca un personaje por su identificador.
     * @param id identificador del personaje.
     * @return Character si existe, null si no se encuentra.
     */
    @GetMapping("/{id}")
    public Character getById(@PathVariable Long id){
        Optional<Character> character = characterRepository.findById(id);
        return character.orElse(null);
    }
}
