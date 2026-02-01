package com.translator.darija_translator.service;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;
import org.springframework.web.client.RestTemplate;
import java.util.Map;
import java.util.List;

@Service
public class GeminiService {

    @Value("${gemini.api.key}")
    private String apiKey;

    private final String API_URL =
    		 "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=";


    public String translate(String text) {
        String url = API_URL + apiKey;
        RestTemplate restTemplate = new RestTemplate();

        Map<String, Object> requestBody = Map.of(
            "contents", List.of(
                Map.of("parts", List.of(
                    Map.of("text",
                        "Translate the following English text to Moroccan Darija dialect. Only provide the translation:\n" + text)
                ))
            )
        );

        try {
            Map response = restTemplate.postForObject(url, requestBody, Map.class);

            List candidates = (List) response.get("candidates");
            Map firstCandidate = (Map) candidates.get(0);
            Map content = (Map) firstCandidate.get("content");
            List parts = (List) content.get("parts");
            Map firstPart = (Map) parts.get(0);

            return (String) firstPart.get("text");

        } catch (Exception e) {
            return "Erreur API : " + e.getMessage();
        }
    }
}
