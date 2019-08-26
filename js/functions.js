window.onload = function () {
    let form = document.getElementsByName('feedback')[0];
    let cont_button = document.getElementsByClassName('feedback')[0];
    cont_button.addEventListener("click", function () {
        form.style.display = 'block';
        cont_button.style.display = 'none';
    });
}


