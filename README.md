# Darija-translate
English to Darija Translator (LLM-Powered) Un service web RESTful sécurisé construit avec Spring Boot qui utilise l'IA Google Gemini pour traduire du texte anglais vers le dialecte arabe marocain (Darija). Le projet inclut un client PHP et une extension Chrome (Manifest V3) utilisant l'API SidePanel.
# 🌍 English to Darija Translator (LLM-Powered)

Ce projet implémente un service web RESTful intelligent pour la traduction de l'anglais vers le dialecte arabe marocain (**Darija**), alimenté par l'IA **Google Gemini**.

## 🚀 Fonctionnalités
* **API REST (Spring Boot)** : Point de terminaison sécurisé `/translate`.
* **Intelligence Artificielle** : Intégration de Gemini 1.5 Flash pour des traductions naturelles.
* **Sécurité Jakarta** : Authentification Basic (Login/Password).
* **Client PHP** : Interface web simple pour interagir avec le service.
* **Extension Chrome** : Panneau latéral (Side Panel) pour traduire en naviguant.

## 🛠️ Technologies utilisées
* **Backend** : Java 17, Spring Boot, Spring Security, Maven.
* **Frontend** : PHP, HTML5, CSS3 (Dark Mode), JavaScript.
* **Navigateur** : Manifest V3 (Chrome Extension API).
* **OS de développement** : Kubuntu.

## 📸 Tests & Captures d'écran

### Test avec Postman
Voici la validation du fonctionnement de l'API avec l'authentification :
![Postman Test](screenshots/postman_test.png)

### Extension Chrome
L'interface intégrée au navigateur :
![Chrome Extension](screenshots/extension_preview.png)

## ⚙️ Installation

### 1. Backend (Java)
1. Clonez le dépôt.
2. Ajoutez votre clé API Gemini dans `src/main/resources/application.properties` :
   ```properties
   gemini.api.key=AIzaSyCCm5Zc74EI2u5BAciEFDM-3L6JMkzIPZU
