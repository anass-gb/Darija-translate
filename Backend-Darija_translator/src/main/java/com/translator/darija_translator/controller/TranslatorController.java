package com.translator.darija_translator.controller;

import com.translator.darija_translator.service.GeminiService;

import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
@CrossOrigin(origins = "*") // Permet à l'extension de parler à Java
@RequestMapping("/api")

public class TranslatorController {

    private final GeminiService geminiService;

    public TranslatorController(GeminiService geminiService) {
        this.geminiService = geminiService;
    }

    @GetMapping("/translate")
    public String translate(@RequestParam String text) {
        return geminiService.translate(text);
    }
}
