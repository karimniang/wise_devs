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

etudiants = $("input");
for (id of etudiants) {
  console.log(id.getAttribute("value"));
}
function verif(e) {
  chambreId = e.getAttribute("value");
  alert(chambreId);
}
