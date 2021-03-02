$.ajax({
    method: "GET",
    url:
        "https://api.unsplash.com/photos?page=1&client_id=nm_EGxUFnktlV15-WPx6u1v69BQKsQRfO1ixuQ0iM6A",
    success: function (data) {
        console.log(data);
    },
});
console.log("tite");
