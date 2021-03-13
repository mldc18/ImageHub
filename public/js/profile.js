$("#createAlbum").click(function () {
    $("#createAlbumModal").modal("toggle");
});
$("#createAlbumForm").on("submit", function (e) {
    e.preventDefault();
    console.log("one");
    $.ajax({
        type: "POST",
        url: "/create-album",
        data: $("#createAlbumForm").serialize(),
        success: function () {
            $(".toast").toast("show");
            $("#createAlbumModal").modal("toggle");
            $("#createAlbumForm")[0].reset();
        },
        error: function () {
            dangerNotification("There was a problem upon creating an album");
        },
    });
});
