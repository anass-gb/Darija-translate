<?php
$translation = "";
$error = "";

// Si le formulaire est envoyé
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_POST["text"]) || trim($_POST["text"]) === "") {
        $error = "❌ Please enter some text.";
    } else {
        $text = urlencode($_POST["text"]);

        // ✅ Backend qui fonctionne chez toi
        $apiUrl = "http://localhost:8080/api/translate?text=$text";

        $response = @file_get_contents($apiUrl);

        if ($response === FALSE) {
            $error = "❌ Error calling translation service";
        } else {
            $translation = $response;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Darija Translator</title>

    <style>
        body {
            background-color: #0f172a;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: white;
        }

        .card {
            background-color: #020617;
            width: 420px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0,0,0,0.6);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            height: 120px;
            border-radius: 8px;
            border: none;
            padding: 10px;
            font-size: 14px;
            resize: none;
        }

        button {
            width: 100%;
            margin-top: 15px;
            padding: 12px;
            background-color: #22c55e;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #16a34a;
        }

        .box {
            background-color: #1e293b;
            padding: 10px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .result {
            background-color: #14532d;
        }

        .error {
            background-color: #7f1d1d;
            padding: 10px;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>🇬🇧 ➜ 🇲🇦 English to Darija</h2>

    <form method="POST">
        <textarea name="text" placeholder="Type your English sentence here..." required><?php
            if (isset($_POST["text"])) echo htmlspecialchars($_POST["text"]);
        ?></textarea>
        <button type="submit">Translate</button>
    </form>

    <?php if ($translation): ?>
        <div class="box result">
            <strong>Translation:</strong><br>
            <?php echo htmlspecialchars($translation); ?>
        </div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
