console.log("app.js");
let page_num = 1;
let search_items = [];
// when reaching the bottom of result, appends another set of images
$(window).bind("scroll", function () {
    if (
        $(window).scrollTop() >=
        $(".result").offset().top +
            $(".result").outerHeight() -
            window.innerHeight
    ) {
        showPage();
    }
});
function showImageModal(url, name, desc) {
    console.log("tite");
    $("#imageModal").modal("show");
    $("#placeholder").attr("src", url);
    $("#imageDesc").text(desc + " : ");
    $("#imageTitle").text("Published by " + name);
}

function showPage() {
    fetch(
        "https://api.unsplash.com/photos?page=" +
            page_num +
            "&client_id=nm_EGxUFnktlV15-WPx6u1v69BQKsQRfO1ixuQ0iM6A"
    )
        .then((data) => data.json())
        .then((data) =>
            data.forEach((element) => {
                $(".result").append(
                    `<div class='item mb-2'><img class='unsplash-images' src='${element.urls.small}' onclick='showImageModal("${element.urls.regular}", "${element.user.name}", "${element.alt_description}" )'></div>`
                );

                var $grid = $(".result").imagesLoaded(function () {
                    // init Masonry after all images have loaded
                    $grid.masonry({
                        gutter: 10,
                        itemSelector: ".item",
                        isFitWidth: true,
                    });
                });
                $grid.masonry("reloadItems");
            })
        );
    page_num += 1;
}

showPage();

function searchPhotos() {
    console.log("working");
    let clientId = "nm_EGxUFnktlV15-WPx6u1v69BQKsQRfO1ixuQ0iM6A";
    let query = document.getElementById("searchInput").value;
    let same_query = false;
    let query_obj = {
        query_length: 1,
        query_name: query,
    };
    let page_num_search = query_obj.query_length;
    for (item of search_items) {
        if (query == item.query_name) {
            same_query = true;
            item.query_length += 1;
            page_num_search = item.query_length;
        }
    }
    if (!same_query) search_items.push(query_obj);
    let url =
        "https://api.unsplash.com/search/photos?page=" +
        page_num_search +
        "&client_id=" +
        clientId +
        "&query=" +
        query;
    fetch(url)
        .then((data) => data.json())
        .then((data) =>
            data.results.forEach((element) => {
                var $result = $(
                    `<div class='item mb-2'><img class='unsplash-images' src='${element.urls.small}' onclick='showImageModal("${element.urls.regular}", "${element.user.name}", "${element.alt_description}" )'></div>`
                );
                $(".result").prepend($result).masonry("reloadItems");
                var $grid = $(".result").imagesLoaded(function () {
                    // init Masonry after all images have loaded
                    $grid.masonry({
                        gutter: 10,
                        itemSelector: ".item",
                        isFitWidth: true,
                    });
                });
            })
        );
    console.log(url);
}
