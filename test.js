function validateForm() {
    var numEleve = document.forms["saisieForm"]["numEleve"].value;
    var moyenne = document.forms["saisieForm"]["moyenne"].value;
    var matiere = document.forms["saisieForm"]["matiere"].value;

    if (numEleve == "" || !/^4SI\d{2}$/.test(numEleve)) {
        alert("Numéro de l'élève invalide. Il doit commencer par '4SI' suivi de deux chiffres non nuls.");
        return false;
    }

    if (moyenne == "" || moyenne < 0 || moyenne > 20) {
        alert("La moyenne doit être comprise entre 0 et 20.");
        return false;
    }

    if (matiere == "") {
        alert("Veuillez sélectionner une matière.");
        return false;
    }

    return true;
}

// Fonction pour réinitialiser le formulaire
function resetForm() {
    document.getElementById("saisieForm").reset();
}
