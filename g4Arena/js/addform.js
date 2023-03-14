function Afficher() {

    document.getElementById("button").addEventListener("click", function(){
        document.querySelector(".popup").style.display= "flex";
    })
    }
    
    function fermer(){
    
    document.querySelector(".close").addEventListener("click", function(){
        document.querySelector(".popup").style.display= "none";
    })
    }