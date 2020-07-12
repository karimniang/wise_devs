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

$("a").on("click", function verif(e) {
  //alert("ok");
  chambreId = this.getAttribute("val");
  //alert(chambreId);
  etudiants = $("input");
  for (id of etudiants) {
    //console.log(id.getAttribute("value"));
    if (chambreId == id) {
      alert("ok");
    } else if (chambreId != id) {
      alert("nonok");
    }
  }
});
