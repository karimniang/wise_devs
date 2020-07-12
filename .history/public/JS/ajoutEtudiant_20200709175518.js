document.getElementById("etudiant_loger").value = "";
function val() {
  etat = $("#etudiant_Etat").val();
  if (etat == "boursier") {
    //alert("bb");
    document.getElementById("etudiant_adresse").value = "";
    document.getElementById("etudiant_montant").style.display = "block";
    document.getElementById("etudiant_isHoused").style.display = "block";
    document.getElementById("etudiant_adresse").style.display = "none";
    //$("#etudiant_adresse").val() = "";
  } else if (etat == "nonBoursier") {
    //$("#etudiant_montant").val() = "";
    //$("#etudiant_isHoused").val() = "";
    //$("#etudiant_loger").val() = "";
    document.getElementById("etudiant_montant").value = "";
    document.getElementById("etudiant_isHoused").value = "";
    document.getElementById("etudiant_loger").value = "";
    document.getElementById("etudiant_montant").style.display = "none";
    document.getElementById("etudiant_isHoused").style.display = "none";
    document.getElementById("etudiant_loger").style.display = "none";

    document.getElementById("etudiant_adresse").style.display = "block";
    //alert("nnbb");
  }
}
function valLoge() {
  loge = $("#etudiant_isHoused").val();
  if (loge == "oui") {
    document.getElementById("etudiant_loger").style.display = "block";
  } else if (loge == "non") {
    $("#etudiant_isHoused option").prop("selected", function () {
      return this.defaultSelected;
    });
    document.getElementById("etudiant_loger").value = "";
    document.getElementById("etudiant_loger").style.display = "none";
  }
}

$("#etudiant_save").click(function () {
  alert("ok");
});
