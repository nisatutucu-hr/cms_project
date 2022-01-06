$(document).ready(() => {
  /*
  $(".isActiveSetter").on("change", () => {
    console.log(this);

    console.log($(this).prop("checked"));
  });*/

  $(".isActiveSetter").on("change", function () {
    let status = $(this).prop("checked");
    let url = $(this).data("url");

    $.ajax({
      type: "post",
      url,
      data: {
        status,
      },
      success: function (response) {},
    });
  });
});
