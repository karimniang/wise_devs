$(document).ready(function () {
  $("#table_id").DataTable();
});

$(document).ready(function () {
  $("#deuxiemeTable_id").DataTable({
    scrollY: "250px",
    scrollCollapse: true,
    paging: false,
  });
});
