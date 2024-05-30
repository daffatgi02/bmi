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


document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const togglePassword2 = document.getElementById('togglePassword2');
    const passwordConfirm = document.getElementById('password-confirm');

    togglePassword.addEventListener('click', function () {
        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle the icon
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });

    togglePassword2.addEventListener('click', function () {
        // Toggle the type attribute
        const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirm.setAttribute('type', type);

        // Toggle the icon
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
});
