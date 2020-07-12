$(document).ready(function () {
  $("#table_id").DataTable();
});

$(document).ready(function () {
  $("#deuxiemeTable_id").DataTable({
    scrollY: "200px",
    scrollCollapse: true,
    paging: false,
  });
});
