$("#etudiant_bourse").click(function () {
  document.getElementById("etudiant_boursier").style.display = "block";
  document.getElementById("etudiant_boursier_libelle").attributes.required;

  document.getElementById("etudiant_boursier_montant").attributes.required;
  document.getElementById("etudiant_nonBoursier").style.display = "none";
});
$("#etudiant_non_bourse").click(function () {
  document.getElementById("etudiant_boursier").style.display = "none";
  document.getElementById("etudiant_nonBoursier").style.display = "block";
  document.getElementById("etudiant_nonBoursier_adresse").attributes.required =
    "true";
});
