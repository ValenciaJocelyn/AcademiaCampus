const profileInput = document.getElementById('profile-picture');
const profileImg = document.querySelector('.profile-img');

profileInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
        profileImg.src = URL.createObjectURL(file);
    }
});
