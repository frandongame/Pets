package com.hellin.despliegue_api_rest.controller;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import com.hellin.despliegue_api_rest.repository.PetRepository;
import com.hellin.despliegue_api_rest.entity.Pet;
import java.util.List;

@RestController
@RequestMapping("/pet")
/**
 * En este controlador se exponen los endpoints relacionados con pets{@link Pet}
 * @version 1.0
 * @author Fran
 */
public class PetController {

    private PetRepository petRepository;

    /**
     * Constructor del controlador de pets
     * @param petRepository repositorio para consultar en pets
     */

    public PetController(PetRepository petRepository) {
        this.petRepository = petRepository;
    }

    /**
     * Este metodo devuelve una lista de pets
     * @return {@code List<Pet>} informacion de pets
     */

    @GetMapping("/List")
    public List<Pet> hello() {


        return petRepository.findAll();
    }
}
