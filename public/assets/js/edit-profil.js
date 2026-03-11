import { classManipulation } from "/assets/js/class-module.js";
import {
  setErrorMessage,
  ImageFile,
  hidePreview,
  emptyValue,
  setDefaultValue,
  InputValidator,
  removeErrorMessage,
} from "./ClassForms.js";
const C_InputValidator = new InputValidator();
const inputElements = [
  {
    inputId: "namaLengkap",
    messageErrorId: "errorInputNamaLengkap",
    validations: {
      stringValidation: [
        {
          method: "isInvalidValue",
          param: /[^a-z\.\s]/gi,
          errorMessage: "Format nama lengkap tidak sesuai. Pastikan hanya memiliki alfabet, spasi, dan titik.",
          isNegate: false
        },
        {
          method: "isEmptyValue",
          param: "",
          errorMessage: "Nama lengkap tidak boleh kosong.",
          isNegate: false
        },
        {
          method: "isShortValue",
          param: 5,
          errorMessage: "Nama lengkap terlalu pendek.",
          isNegate: false
        },
        {
          method: "isLongValue",
          param: 50,
          errorMessage: "Nama lengkap terlalu panjang.",
          isNegate: false
        }
      ]
    },
  },
  {
    inputId: "kartuTandaAnggota",
    messageErrorId: "errorInputKTA",
    validations: {
      stringValidation: [
        {
          method: "isInvalidValue",
          param: /[^\w\s\. \/\(\)\-]/gi,
          errorMessage: "Format Kartu Tanda Anggota tidak valid."
        },
        {
          method: "isShortValue",
          param: 5,
          errorMessage: "Nomor Kartu Tanda Anggota terlalu pendek.",
          isNegate: false
        },
        {
          method: "isLongValue",
          param: 30,
          errorMessage: "Nomor Kartu Tanda Anggota terlalu panjang.",
          isNegate: false
        }
      ]
    }
  },
  {
    inputId: "tanggalLahir",
    messageErrorId: "errorInputTanggalLahir",
    validations: {
      date: [
        {
          method: "isValidAge",
          param: 18,
          errorMessage: "Minimal umur diatas 18 tahun.",
          isNegate: true
        },
        {
          method: "isValidDate",
          param: "",
          errorMessage: "Tanggal lahir tidak valid.",
          isNegate: true
        },
      ]
    }
  },
  {
    inputId: "noTelp",
    messageErrorId: "errorInputNoTelp",
    validations: {
      stringValidation: [
        {
          method: "isEmptyValue",
          param: "",
          errorMessage: "Nomor HP tidak boleh kosong.",
          isNegate: false
        }
      ],
      telephone: [
        {
          method: "isValidNumber",
          param: "",
          errorMessage: "Format HP tidak valid.",
          isNegate: true
        }
      ]
    },
  },
  {
    inputId: "namaKantorMedia",
    messageErrorId: "errorInputNamaKantor",
    validations: {
      stringValidation: [
        {
          method: "isInvalidValue",
          param: /[^a-z\s\(\)]/gi,
          errorMessage: "Nama kantor/perusahaan tidak valid. Pastikan hanya memiliki alfabet, tanda kurung dan spasi.",
          isNegate: false
        },
        {
          method: "isShortValue",
          param: 2,
          errorMessage: "Nama kantor/perusahaan media terlalu pendek.",
          isNegate: false
        },
        {
          method: "isLongValue",
          param: 30,
          errorMessage: "Nama kantor/perusahaan media terlalu panjang.",
          isNegate: false
        }
      ],
    },
  },
  {
    inputId: "alamatKantorMedia",
    messageErrorId: "errorInputAlamatKantor",
    validations: {
      stringValidation: [
        {
          method: "isShortValue",
          param: 5,
          errorMessage: "Nama kantor/perusahaan media terlalu pendek.",
          isNegate: false
        },
        {
          method: "isLongValue",
          param: 255,
          errorMessage: "Alamat kantor/perusahaan media terlalu panjang.",
          isNegate: false
        }
      ],
      address: [
        {
          method: "isValidAddress",
          param: "",
          errorMessage: "Format alamat tidak sesuai. Contoh yang benar: Jl. Melati No. 5, RT. 01 RW. 02, Jakarta, 14350.",
          isNegate: true
        }
      ]
    },
  },
];
// daftar mime file yang diizinkan
const allowedExtensions = ["image/jpeg", "image/png", "image/webp"];
// @event
document.addEventListener("DOMContentLoaded", () => {
  const btnChangeData = document.getElementById("btnChangeData");
  const boxDataProfile = document.getElementById("boxDataProfile");
  const boxChangeData = document.getElementById("boxChangeData");
  const cancelChangeData = document.getElementById("cancelChangeData");
  const inputChangeProfil = document.getElementById("changeProfile");
  const figureProfilePreview = document.getElementById("figureProfilePreview");
  const currentProfileImage = document.getElementById("currentProfileImage");
  const messageError = document.querySelector(".error-message");
  const cancelChangeProfile = document.getElementById("cancelChangeProfile");
  // @event
  btnChangeData.addEventListener("click", function () {
    classManipulation(this).add("hidden");
    classManipulation(boxDataProfile).add("hidden");
    classManipulation(boxChangeData).remove("hidden");
  });
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
        "Ekstensi file tidak diizinkan. Coba lagi!",
      );
    // @if ukuran file gambar lebih dari 5 MB
    if (C_Img.validateSizeImage().isImgTooLarge(5))
      return setErrorMessage(
        messageError,
        `Ukuran file melebihi batas maksimum. Perkecil ukuran file dan upload kembali!`,
      );
    // @if hapus pesan error jika ada, agar saat user mengganti gambar kembali, pesan error dihilangkan
    if (messageError.textContent !== "") messageError.textContent = "";
    // tampilkan preview
    C_Img.setImagePreview(
      currentProfileImage,
      figureProfilePreview.parentElement,
    );
  });
  // @event
  cancelChangeProfile.addEventListener("click", () => {
    hidePreview(currentProfileImage, figureProfilePreview.parentElement);
    emptyValue(inputChangeProfil);
  });
  const inputs = boxChangeData.querySelectorAll("input:not([hidden])");
  // @event
  cancelChangeData.addEventListener("click", function () {
    hidePreview(currentProfileImage, figureProfilePreview.parentElement);
    emptyValue(inputChangeProfil);
    setDefaultValue(inputs);
    classManipulation(btnChangeData).remove("hidden");
    classManipulation(boxDataProfile).remove("hidden");
    classManipulation(boxChangeData).add("hidden");
  });
  // button submit change data
  const btnSubmit = document.getElementById("submitChangeData");
  // @event
  document.getElementById("noTelp").addEventListener("change", function () {
    if (this.value.includes("-") === false) return;
    C_InputValidator.telephone(this).dashRemove();
  });
  // @event
  btnSubmit.addEventListener("click", function () {
    // @for
    // @note: jika bisa, lakukan refactoring dengan membungkuskan eksekusi kode looping kedalam function
    for (const { inputId, messageErrorId, validations } of inputElements) {
      const inputEl = document.getElementById(inputId);
      const messageEl = document.getElementById(messageErrorId);
      removeErrorMessage(messageEl)
      // @for
      for (const [validator, rules] of Object.entries(validations)) {
        // @for
        for (const { method, param, errorMessage, isNegate } of rules) {
          const rawResult = C_InputValidator[validator](inputEl)[method](param);
          const result = isNegate ? !rawResult : rawResult;
          if (result) {
            setErrorMessage(messageEl, errorMessage);
          }
        }
      }
    }
    /** Save Data Profile to Database **/
  });
});