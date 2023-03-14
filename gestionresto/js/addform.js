function Afficher() {

    document.getElementById("button").addEventListener("click", function () {
        document.querySelector(".popup").style.display = "flex";
    })
}

function fermer() {

    document.querySelector(".close").addEventListener("click", function () {
        document.querySelector(".popup").style.display = "none";
    })
}

function Affiche() {

    document.getElementById("bouton").addEventListener("click", function () {
        document.querySelector(".popu").style.display = "flex";
    })
}

function ferme() {

    document.querySelector(".fermer").addEventListener("click", function () {
        document.querySelector(".popu").style.display = "none";
    })
}