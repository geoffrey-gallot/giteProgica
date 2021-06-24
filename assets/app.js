/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
import '../node_modules/bootstrap/dist/css/bootstrap.min.css';

//import ScrollReveal
import ScrollReveal from 'scrollreveal';


let cards = document.querySelectorAll(".card");


ScrollReveal().reveal(cards, {
    delay: 250,
    duration: 250,
    easing: "ease-in-out",
    interval: 400,
    reset: true,

});