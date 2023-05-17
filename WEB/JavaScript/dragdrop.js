// Variables globales pour stocker l'état initial de l'image
var initialCell = null;
var initialParent = null;

// Fonction pour réinitialiser la position de l'image
function resetImagePosition() {
    if (initialCell && initialParent) {
        initialParent.appendChild(initialCell);
        initialCell = null;
        initialParent = null;
    }
};

// Fonction de glisser
function drag(event) {
    event.dataTransfer.setData("text/plain", event.target.id);
}

// Fonction pour autoriser le dépôt
function allowDrop(event) {
    event.preventDefault();
}

// Fonction de dépôt
function drop(event) {
    event.preventDefault();
    var imageId = event.dataTransfer.getData("text/plain");
    var image = document.getElementById(imageId);

    // Stocke l'état initial de l'image avant de la déplacer
    if (!initialCell && !initialParent) {
        initialCell = image;
        initialParent = image.parentNode;
    }

    event.target.appendChild(image);
}
