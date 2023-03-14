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

function showNotification() {
    var notification = document.querySelector('.notification');
    notification.classList.add('show');
    setTimeout(function() {
      notification.classList.remove('show');
    }, 4000);
  }
  
  function closeNotification() {
    var notification = document.querySelector('.notification');
    notification.classList.remove('show');
  }
  