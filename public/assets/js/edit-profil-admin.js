import { classManipulation } from "/assets/js/class-module.js";
import {
    setErrorMessage,
    ImageFile,
    hidePreview,
    emptyValue,
} from "./ClassForms.js";
// daftar mime file yang diizinkan
const allowedExtensions = ["image/jpeg", "image/png", "image/webp"];
// @event
document.addEventListener("DOMContentLoaded", () => {
    const inputChangeProfil = document.getElementById("changeProfile");
    const figureProfilePreview = document.getElementById("figureProfilePreview");
    const currentProfileImage = document.getElementById("currentProfileImage");
    const messageError = document.querySelector(".error-message");
    const cancelChangeProfile = document.getElementById("cancelChangeProfile");
    const btnChangeProfil = document.getElementById("btnChangeProfil");
    const btnSubmit = document.getElementById("submitChangeData");
    // @event
    inputChangeProfil.addEventListener("change", function () {
        const C_Img = new ImageFile(this.files[0]);
        // @if file gambar tidak ada
        if (!C_Img.isFileExist())
            return hidePreview(
                currentProfileImage,
                figureProfilePreview.parentElement,
            );
        // @if jumlah karakter dinama file melebihi 55 karakter
        if (C_Img.nameLength > 55)
            return setErrorMessage(
                messageError,
                "Nama file terlalu panjang, ubah nama file terlebih dahulu",
            );
        // @if file gambar korup atau rusak
        if (C_Img.validateSizeImage().isImgCorrupted())
            return setErrorMessage(
                messageError,
                "File kosong atau rusak, silahkan pilih file lain.",
            );
        // @if ekstensi file gambar tidak diizinkan
        if (!C_Img.isAllowedExtensions(allowedExtensions))
            return setErrorMessage(
                messageError,
                "Ekstensi file tidak diizinkan. Pastikan ekstensi gambar adalah .jpg/jpeg, .png, dan .webp!",
            );
        // @if ukuran file gambar lebih dari 5 MB
        if (C_Img.validateSizeImage().isImgTooLarge(5))
            return setErrorMessage(
                messageError,
                `Ukuran file melebihi batas maksimum (Maks. 5 MB).`,
            );
        // @if hapus pesan error jika ada, agar saat user mengganti gambar kembali, pesan error dihilangkan
        if (messageError.textContent !== "") messageError.textContent = "";
        // tampilkan preview
        C_Img.setImagePreview(
            currentProfileImage,
            figureProfilePreview.parentElement,
        );
        classManipulation(btnChangeProfil).add("hidden")
        classManipulation(btnSubmit).remove("hidden")
    });
    // @event
    cancelChangeProfile.addEventListener("click", () => {
        hidePreview(currentProfileImage, figureProfilePreview.parentElement);
        emptyValue(inputChangeProfil);
        classManipulation(btnChangeProfil).remove("hidden")
        classManipulation(btnSubmit).add("hidden")
    });
    // @event
    btnSubmit.addEventListener("click", function () {
        /** Save Data Profile to Database **/
    });
});