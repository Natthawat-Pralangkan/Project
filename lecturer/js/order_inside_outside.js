$(document).ready(function () {
  $.ajax({
    url: "./get",
    type: "POST",
    data: {
      id: localStorage.getItem("id"),
    },
    success: function (get) {
      var data = JSON.parse(get);
      $("#order_inside_outside").DataTable({
        data: data,
        columns: [
          {
            data: "use_name",
          },
          {
            data: "password",
          },
          {
            data: "type",
          },
        ],
      });
    },
  });
});
