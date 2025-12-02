package com.hellin.stranger.model;

import jakarta.persistence.*;

/**
 * Entidad que representa un personaje de Stranger Things.
 * Se corresponde con la tabla "characters" en la base de datos.
 * @version 1.0
 * Autor: [Tu Nombre]
 */
@Entity
@Table(name = "characters")
public class Character {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String name;

    private String power;

    @Column(name = "power_level")
    private Integer powerLevel;

    private String description;

    /**
     * Constructor vacío requerido por JPA.
     */
    public Character() {}

    // Getters y Setters

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getPower() {
        return power;
    }

    public void setPower(String power) {
        this.power = power;
    }

    public Integer getPowerLevel() {
        return powerLevel;
    }

    public void setPowerLevel(Integer powerLevel) {
        this.powerLevel = powerLevel;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }
}
