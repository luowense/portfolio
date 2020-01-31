/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
 // End of use strict
var $ = require('jquery');
window.$ = $;
//window.jQuery = $;
//require('jquery');
require('bootstrap');
//require('jquery/src/jquery');
//import $ from 'jquery';
require('./loginPage.js');
// require('../js/timeline.js');
require('./style.js');
//import '../js/style';
// import '../js/timeline.js';
// import '../js/loginPage.js';
// any CSS you import will output into a single css file (app.scss in this case)
import '../css/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.


console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
