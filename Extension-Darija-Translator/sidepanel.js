document.getElementById("translateBtn").addEventListener("click", async () => {
    const text = document.getElementById("inputText").value;
    const resultDiv = document.getElementById("result");

    if (!text.trim()) {
        resultDiv.textContent = "❌ Please enter text";
        return;
    }

    resultDiv.textContent = "⏳ Translating...";

    try {
        const response = await fetch(
            "http://localhost:8080/api/translate?text=" + encodeURIComponent(text)
        );

        if (!response.ok) {
            throw new Error("HTTP error");
        }

        const translation = await response.text();
        resultDiv.textContent = translation;

    } catch (error) {
        resultDiv.textContent = "❌ Error calling translation service";
    }
});
