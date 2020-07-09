function val() {
  etat = $("#etudiant_Etat").val();
  if (etat == "boursier") {
    //alert("bb");
    document.getElementById("etudiant_montant").style.display = "block";
    document.getElementById("etudiant_isHoused").style.display = "block";
    document.getElementById("etudiant_adresse").style.display = "none";
    document.getElementById("etudiant_adresse").val() = "";
  } else if (etat == "nonBoursier") {
    document.getElementById("etudiant_montant").style.display = "none";
    document.getElementById("etudiant_isHoused").style.display = "none";
    document.getElementById("etudiant_loger").style.display = "none";
    document.getElementById("etudiant_montant").val() = "";
    document.getElementById("etudiant_isHoused").val() = "";
    document.getElementById("etudiant_loger").val() = "";
    document.getElementById("etudiant_adresse").style.display = "block";
    //alert("nnbb");
  }
}
function valLoge() {
  loge = $("#etudiant_isHoused").val();
  if (loge == "oui") {
    document.getElementById("etudiant_loger").style.display = "block";
  } else if (loge == "non") {
    document.getElementById("etudiant_loger").style.display = "none";
  }
}
