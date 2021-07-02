/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.css";

// start the Stimulus application
import "./bootstrap";
import "../node_modules/bootstrap/dist/css/bootstrap.min.css";

//import ScrollReveal
import ScrollReveal from "scrollreveal";
//import Algolia places
import Places from "places.js";
//import Leaflet
import L from "leaflet";
import "leaflet/dist/leaflet.css";

let cards = document.querySelectorAll(".card");

let btncontact = document.getElementById("contact");
let formContact = document.getElementById("contactForm");

let inputAddress = document.getElementById("gite_address");

//formulaire de contact
btncontact.addEventListener("click", (e) => {
  e.preventDefault;
  formContact.style.display = "block";
});

//apparition des cards au scroll
ScrollReveal().reveal(cards, {
  delay: 250,
  duration: 250,
  easing: "ease-in-out",
  interval: 400,
  reset: true,
});

//Autocompletoin adresses gites + recuperation coordonnées
if (inputAddress !== null) {
  let place = Places({
    container: inputAddress,
  });

  place.on("change", (e) => {
    document.querySelector("#gite_city").value = e.suggestion.city;
    document.querySelector("#gite_postalCode").value = e.suggestion.postcode;
    document.querySelector("#gite_lat").value = e.suggestion.latlng.lat;
    document.querySelector("#gite_lng").value = e.suggestion.latlng.lng;
  });
}

//mise en place map
let map = document.querySelector("#map");
if (map !== null) {
  let icon = L.icon({
    iconUrl:"images/gites/marker-icon.png"
  })
  let center = [map.dataset.lat, map.dataset.lng];
  map = L.map("map").setView([map.dataset.lat, map.dataset.lng], 13);
  let token =
    "pk.eyJ1IjoiZ2VvZmZyZXlnYWxsb3QiLCJhIjoiY2txbGZ3Ymx3MGlsOTJwbjRid2Y4bjNqNiJ9.NkldUk8DCgCA7vqDZqQQ9A";
  L.tileLayer(
    `https://api.mapbox.com/v4/mapbox.satellite/{z}/{x}/{y}.png?access_token=${token}`,
    {
      maxZoom: 18,
      minZoom: 10,
    }
  ).addTo(map);
  L.marker(center, {icon: icon}).addTo(map);
}
