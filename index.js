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
