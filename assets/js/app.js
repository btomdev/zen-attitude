/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// Dans ce cas precis tous les fichiers scss sont empilés
// dans un unique fichier app.scss
// require('../css/app.css');
import "../scss/app.scss";

// charge le paquet jquery à partir de node_modules
// var $ = require('jquery');
// require jQuery dans une variable local / normally
import $ from "jquery";

// charge le paquet bootstrap à partir de node_modules
import "bootstrap";

// charge le js du template grayscale
import "./grayscale";

// charge le paquet bootstrap4-toggle à partir de node_modules
import "bootstrap5-toggle";

// charge le paquet gijgo à partir de node_modules
import "gijgo";

// charge le js pour l'Ajax page stage
import "./ajax";

// charge le js pour les modals
import "./modals";

// charge le plugin jQuery liScroll pour les news
import "./news";

// charge le js pour les images de la galerie
import "./gallery";

// charge le plugin datatable à partir de node_modules
import "datatables.net-dt";

$(document).ready(function () {
  // tout le code d'ici est executé dans la page consultée

  // pop-up de select heure
  $(".timepicker").timepicker({
    modal: true,
    header: true,
    footer: true,
    mode: "24hr",
    size: "large",
    uiLibrary: "materialdesign",
  });

  // news text defilant
  $(function () {
    $("ul#ticker01").liScroll({ travelocity: 0.08 });
  });

  // scroll tbody sur la table des users
  // options de la table d'après le plugin jQuery DataTable
  $("#scrollTable").DataTable({
    paging: false,
    scrollY: 200,
    bInfo: false,
    language: {
      emptyTable: "Aucune donnée dans la table",
    },
  });
  // Bouton de recherche personnalisé avec id et fonctions DataTable
  var dataTable = $("#scrollTable").DataTable();
  $("#search_box").on("keyup", function () {
    dataTable.search(this.value).draw();
  });
  $("#search_box")
    .focus(function () {
      $(this).prev().removeClass("text-white");
      $(this).prev().addClass("text-primary font-weight-bold");
    })
    .focusout(function () {
      $(this).prev().removeClass("text-primary font-weight-bold");
      $(this).prev().addClass("text-white");
    });
});
