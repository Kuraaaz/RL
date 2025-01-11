// This file contains JavaScript code that handles the spawning of images next to the paragraphs as the user scrolls down the page. 
// It also includes event listeners for mouse hover effects on the images and buttons.

document.addEventListener("DOMContentLoaded", () => {
  const p1 = document.getElementById("p1s");
  const p2 = document.getElementById("p2s");
  const images = ["image1.jpg", "image2.jpg", "image3.jpg"]; // Replace with actual image paths
  const imageContainer = document.createElement("div");
  imageContainer.classList.add("image-container");

  images.forEach((src, index) => {
      const img = document.createElement("img");
      img.src = src;
      img.alt = `Image ${index + 1}`;
      img.classList.add("circular-image");
      img.addEventListener("mouseover", () => {
          img.classList.add("hover");
      });
      img.addEventListener("mouseout", () => {
          img.classList.remove("hover");
      });
      imageContainer.appendChild(img);
  });

  p1.appendChild(imageContainer.cloneNode(true));
  p2.appendChild(imageContainer.cloneNode(true));

  const buttons = document.querySelectorAll("nav a");
  buttons.forEach(button => {
      button.addEventListener("mouseover", () => {
          button.classList.add("button-hover");
      });
      button.addEventListener("mouseout", () => {
          button.classList.remove("button-hover");
      });
  });
});