$("#etudiant_bourse").click(function () {
  document.getElementById("bourse").style.display = "block";
  document.getElementById("nonBourse").style.display = "none";
});
$("#etudiant_non_bourse").click(function () {
  document.getElementById("bourse").style.display = "none";
  document.getElementById("nonBourse").style.display = "block";
});
