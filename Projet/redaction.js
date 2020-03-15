function choix() {
        var retour = confirm("Voulez vous revenir à la page d'accueil ?");
        var lien = document.getElementById("accueil");
        if( retour == true ) {
            lien.getElementById("accueil");
            return true;
        } else {
            return false;
        }
}