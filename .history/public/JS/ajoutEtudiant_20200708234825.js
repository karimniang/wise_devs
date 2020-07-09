function val() {
  etat = $("#etudiant_Etat").val();
  if (etat == "boursier") {
    //alert("bb");
    document.getElementById("etudiant_montant").style.display = "";
    document.getElementById("etudiant_isHoused").style.display = "";
  } else if (etat == "nonBoursier") {
    //alert("nnbb");
  }
}
