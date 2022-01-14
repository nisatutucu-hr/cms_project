$(document).ready(() => {
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

  $(".remove-btn").on("click", function (event) {
    event.preventDefault();
    let url = $(this).data("url");

    Swal.fire({
      title: "Emin misiniz?",
      text: "Bu islemi geri alamayacaksiniz.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Evet",
      cancelButtonText: "Hayir",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
      }
    });
  });

  $(".sortable").sortable({ axis: "y" });

  $(".sortable").on("sortupdate", function () {
    let data = $(this).sortable("serialize");
    let url = $(this).data("url");

    $.ajax({
      type: "post",
      url,
      data: {
        data,
      },
    });
  });
});
