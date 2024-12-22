document.addEventListener("DOMContentLoaded", () => {
    // Animation pour la barre horizontale et les titres
    const header = document.querySelector("header");
    const title = document.getElementById("tit1");
    const p1 = document.getElementById("p1s");
    const p2 = document.getElementById("p2s");
    const formButton = document.getElementById("formulaire-btn");
  
    setTimeout(() => {
      header.classList.add("animate-down");
    }, 500);
  
    setTimeout(() => {
      title.classList.add("animate-down");
    }, 1000);
  
    setTimeout(() => {
      p1.classList.add("animate-up");
      p2.classList.add("animate-up");
    }, 1500);
  
    formButton.addEventListener("click", (e) => {
      e.preventDefault();
      window.location.href = "formulaire.html";
    });
  });
  
// Gestionnaire pour rediriger après soumission du formulaire
const form = document.getElementById("email-form");
form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const email = document.getElementById("email").value;

  try {
    const response = await fetch("http://127.0.0.1:5000/submit", {
      method: "POST",
      headers: {
        "Content-Type": "application/json", // Assure l'envoi en JSON
      },
      body: JSON.stringify({ email }), // Corps de la requête en JSON
    });

    if (response.ok) {
      window.location.href = "success.html"; // Redirection en cas de succès
    } else {
      const errorData = await response.json();
      alert(errorData.error || "Une erreur s'est produite.");
    }
  } catch (error) {
    console.error("Erreur:", error);
    alert("Une erreur s'est produite. Veuillez réessayer.");
  }
});