window.onload = function () {
    var images = document.getElementsByClassName('expandable');
    for (var i = 0; i < images.length; i++) {
        images[i].addEventListener("click", function () {
            var new_img = this.cloneNode();
            new_img.className = 'preview';
            this.after(new_img);
            new_img.addEventListener("click", function () {
                this.remove();
            });
        });
    }
}
