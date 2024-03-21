const inputFile = document.querySelector(".add-ipt input[type=file]");

inputFile.addEventListener("change", function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.addEventListener('load', function () {
        const previewImage = document.querySelector('img#preview-image');
        previewImage.src = reader.result;
        previewImage.style.display = 'block';
    });

    reader.readAsDataURL(file);
});
