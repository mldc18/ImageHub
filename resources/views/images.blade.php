<div id="result" class="grid"></div>
<script>
    fetch("https://api.unsplash.com/photos?page=3&client_id=nm_EGxUFnktlV15-WPx6u1v69BQKsQRfO1ixuQ0iM6A")
        .then(data=>data.json())
            .then(data=>data
                .forEach(element => {
                    $('#result').append(`<div class='item'><img src='${element.urls.small}'></div>`);
                }));
</script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
    $('#result').masonry({
    // options
        percentPosition: true,
        itemSelector: '.item',
        columnWidth: 200
    });
</script>