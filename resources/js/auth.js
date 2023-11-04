document.addEventListener("DOMContentLoaded", function () {
    // Temukan elemen checkbox dan input teks
    var checkbox = document.getElementById("cekLevel");
    var levelInput = document.getElementById("level");

    // Tambahkan event listener untuk mengubah nilai input teks
    checkbox.addEventListener("change", function () {
        if (checkbox.checked) {
            levelInput.value = "bidan";
        } else {
            levelInput.value = "kader";
        }
    });
});
