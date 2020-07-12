document.getElementById("etudiant_loger").value = "";
function val() {
  etat = $("#etudiant_Etat").val();
  if (etat == "boursier") {
    //alert("bb");
    document.getElementById("etudiant_adresse").value = "";
    document.getElementById("etudiant_montant").style.display = "block";
    document.getElementById("etudiant_Est_Loger").style.display = "block";
    document.getElementById("etudiant_adresse").style.display = "none";
    //$("#etudiant_adresse").val() = "";
  } else if (etat == "nonBoursier") {
    //$("#etudiant_montant").val() = "";
    //$("#etudiant_Est_Loger").val() = "";
    //$("#etudiant_loger").val() = "";
    document.getElementById("etudiant_montant").value = "";
    document.getElementById("etudiant_Est_Loger").value = "";
    document.getElementById("etudiant_loger").value = "";
    document.getElementById("etudiant_montant").style.display = "none";
    document.getElementById("etudiant_Est_Loger").style.display = "none";
    document.getElementById("etudiant_loger").style.display = "none";

    document.getElementById("etudiant_adresse").style.display = "block";
    //alert("nnbb");
  }
}
function valLoge() {
  loge = $("#etudiant_Est_Loger").val();
  if (loge == "oui") {
    document.getElementById("etudiant_loger").style.display = "block";
  } else if (loge == "non") {
    $("#etudiant_Est_Loger option").prop("selected", function () {
      return this.defaultSelected;
    });
    document.getElementById("etudiant_loger").value = "";
    document.getElementById("etudiant_loger").style.display = "none";
  }
}

$("#etudiant_save").on("click", function (event) {
  if ($("#etudiant_Etat").val() == "choix" || $("#etudiant_Etat").val() == "") {
    //alert("nnnnnnok");
    event.preventDefault();
    $("#etudiant_Etat").focus();
    $("#message").html("<span>Veuiller choisir l'etat de l'etudiant!</span>");
  }
});
