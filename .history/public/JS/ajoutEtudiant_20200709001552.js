$(document).ready(function () {
  $loge = $("etudiant_isHoused").val();
  alert(loge);
});
function val() {
  etat = $("#etudiant_Etat").val();
  if (etat == "boursier") {
    //alert("bb");
    document.getElementById("etudiant_montant").style.display = "block";
    document.getElementById("etudiant_isHoused").style.display = "block";

    document.getElementById("etudiant_loger").style.display = "";
    document.getElementById("etudiant_adresse").style.display = "none";
  } else if (etat == "nonBoursier") {
    document.getElementById("etudiant_montant").style.display = "none";
    document.getElementById("etudiant_isHoused").style.display = "none";
    document.getElementById("etudiant_loger").style.display = "none";
    document.getElementById("etudiant_adresse").style.display = "block";
    //alert("nnbb");
  }
}
