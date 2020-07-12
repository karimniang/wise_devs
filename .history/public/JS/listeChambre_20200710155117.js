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

$("a").on("click", function verif(e) {
  //alert("ok");
  chambreId = this.getAttribute("val");
  alert(chambreId);
});
