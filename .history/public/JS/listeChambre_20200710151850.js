$(document).ready(function () {
  $("#table_id").DataTable();
});

$(document).ready(function () {
  $("#deuxiemeTable_id").DataTable({
    scrollY: "300px",
    scrollCollapse: true,
    paging: false,
  });
});

$(document).ready(function () {
  etudiants = $("#etudiant");
  for (id of etudiants) {
    console.log(id);
  }
});
