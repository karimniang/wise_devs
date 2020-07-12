$(document).ready(function () {
  $("#table_id").DataTable();
  $("#deuxiemeTable_id").DataTable({
    scrollY: "200px",
    scrollCollapse: true,
    paging: false,
  });
});
