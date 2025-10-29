package com.hellin.despliegue_api_rest.controller;

import com.hellin.despliegue_api_rest.entity.Pet;
import com.hellin.despliegue_api_rest.repository.PetRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import java.util.List;

@RestController
@RequestMapping("/pet")
@CrossOrigin(origins = "*")
public class PetController {

    @Autowired
    private PetRepository petRepository;

    @GetMapping("/List")
    public List<Pet> getAllPets() {
        return petRepository.findAll();
    }
}
