/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import './styles/app.scss';
import 'bootstrap'; // Original bootstrap by Encore
// import './bootstrap.js';

import '@fortawesome/fontawesome-free/css/all.min.css';
import '@fortawesome/fontawesome-free/js/all.js';

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});