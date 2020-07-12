$(document).ready(function () {
  $("#table_id").DataTable();
  $("#example").DataTable({
    scrollY: "200px",
    scrollCollapse: true,
    paging: false,
  });
});
