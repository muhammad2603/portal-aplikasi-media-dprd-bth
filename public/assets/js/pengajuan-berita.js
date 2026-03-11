import { classManipulation } from "./class-module.js";
import {
    setErrorMessage,
    removeErrorMessage,
    InputValidator,
    ImageFile,
    showPreview,
    hidePreview,
    emptyValue
} from './ClassForms.js';
import { Modal } from './modal-class.js';
const C_InputValidator = new InputValidator();
const inputsValidator = [
    {
        inputId: "judulPengajuan",
        messageErrorId: "errorInputJudulPengajuan",
        validations: {
            stringValidation: [
                {
                    method: "isEmptyValue",
                    param: "",
                    errorMessage: "Judul Pengajuan tidak boleh kosong.",
                    isNegate: false
                },
                {
                    method: "isShortValue",
                    param: 5,
                    errorMessage: "Judul Pengajuan terlalu pendek.",
                    isNegate: false
                },
                {
                    method: "isLongValue",
                    param: 50,
                    errorMessage: "Judul Pengajuan terlalu panjang.",
                    isNegate: false
                },
                {
                    method: "isInvalidValue",
                    param: /[^a-z\d\-\(\)\.\,?!'"#%\+\/ ]/gi,
                    errorMessage: "Format Judul Pengajuan tidak valid. Pastikan diisi dengan format umum."
                },
            ],
        }
    },
    {
        inputId: "urlBerita",
        messageErrorId: "errorInputUrlBerita",
        validations: {
            stringValidation: [
                // check origin URL
                {
                    method: "isInvalidValue",
                    param: /^(http|https):\/\/.+\.\w{1,3}\//,
                    errorMessage: "URL tidak valid. Periksa URL kembali.",
                    isNegate: true
                },
                {
                    method: "isEmptyValue",
                    param: "",
                    errorMessage: "URL Berita tidak boleh kosong.",
                    isNegate: false
                },
            ]
        }
    },
    {
        inputId: "tanggalPublikasi",
        messageErrorId: "errorInputTanggalPublikasi",
        validations: {
            stringValidation: [
                {
                    method: "isEmptyValue",
                    param: "",
                    errorMessage: "Tanggal Publikasi tidak boleh kosong.",
                    isNegate: false
                }
            ],
            date: [
                {
                    method: "isValidDate",
                    param: "",
                    errorMessage: "Tanggal Publikasi tidak valid. Periksa tanggal, bulan, dan tahun tidak melebihi tanggal saat ini.",
                    isNegate: true
                }
            ]
        }
    },
    {
        inputId: "inputDeskripsi",
        messageErrorId: "errorInputDeskripsi",
        validations: {
            stringValidation: [
                {
                    method: "isEmptyValue",
                    param: "",
                    errorMessage: "Deskripsi tidak boleh kosong.",
                    isNegate: false
                },
                {
                    method: "isShortValue",
                    param: 30,
                    errorMessage: "Deskripsi terlalu pendek (min. 30 karakter).",
                    isNegate: false
                },
                {
                    method: "isLongValue",
                    param: 300,
                    errorMessage: "Deskripsi terlalu panjang (max. 300 karakter)."
                }
            ]
        }
    }
];
const C_Modal = new Modal();
const allowedExtensions = ["image/jpeg", "image/png", "image/webp"];
document.addEventListener("DOMContentLoaded", () => {
    const inputsEl = document.querySelectorAll('.input');
    const textarea = document.querySelector('textarea');
    const wordCount = document.getElementById('wordCount');
    const lampiranInput = document.getElementById('lampiran');
    const lampiranPreview = document.getElementById("lampiranPreview");
    const lampiranLabel = document.getElementById("lampiranLabel");
    const namaFileLampiran = document.getElementById("namaFileLampiran");
    const lampiranError = document.querySelector('.lampiran-error');
    const cancelLampiran = document.getElementById('cancelLampiran');
    // @event
    inputsEl.forEach(el =>
        el.addEventListener('change', e => {
            removeErrorMessage(document.getElementById(e.target.dataset.errorMessageId))
        }, { once: true })
    )
    // @event
    textarea.addEventListener('input', e => wordCount.textContent = e.target.value.length);
    // @event
    cancelLampiran.addEventListener('click', () => {
        hidePreview(null, lampiranPreview)
        classManipulation(document.getElementById("lampiranLabel")).remove("hidden")
        emptyValue(lampiranInput)
        namaFileLampiran.textContent = "";
    })
    // @event
    lampiranInput.addEventListener('change', function () {
        const C_Img = new ImageFile(this.files[0]);
        // @if validasi ekstensi gambar yang dipilih
        if (!C_Img.isAllowedExtensions(allowedExtensions))
            return setErrorMessage(lampiranError, "Ekstensi gambar tidak diizinkan. Pastikan ekstensinya .jpeg, .jpg, .png, atau .webp!")
        // @if validasi apakah gambar yang dipilih corrupt
        if (C_Img.validateSizeImage().isImgCorrupted())
            return setErrorMessage(lampiranError, "Gagal saat melakukan upload gambar.")
        // @if validasi apakah ukuran gambar yang dipilih melebihi batas maksimal
        if (C_Img.validateSizeImage().isImgTooLarge(2))
            return setErrorMessage(lampiranError, "Ukuran gambar terlalu besar. Maksimal 2 MB.")
        classManipulation(lampiranLabel).add("hidden")
        namaFileLampiran.textContent = C_Img.name;
        C_Img.setImagePreview(null, lampiranPreview)
        lampiranError.textContent = "";
    })
    const btnReset = document.getElementById("btnReset");
    // @event
    btnReset.addEventListener("click", function () {
        // @note: array digunakan untuk melacak value pada semua input dan disimpan kedalamnya
        const valuesInputInArray = [];
        // @note: true => value kosong dan false => value tidak kosong
        inputsEl.forEach(e => {
            if (e.value === "")
                valuesInputInArray.push(true)
            else
                valuesInputInArray.push(false)
        })
        if (lampiranInput.files[0] === undefined)
            valuesInputInArray.push(true)
        else
            valuesInputInArray.push(false)
        // @if validasi jika ada input-an yang tidak kosong (tidak ada false didalam array valuesInputInArray), jangan lakukan reset
        if (!valuesInputInArray.includes(false)) return;
        // berikan tanda konfirmasi reset, jika ya, lakukan reset, jika tidak, batalkan reset
        if (!confirm("Yakin ingin reset data input?")) return;
        hidePreview(null, lampiranPreview)
        classManipulation(document.getElementById("lampiranLabel")).add("hidden")
        classManipulation(lampiranLabel).remove("hidden")
        emptyValue(lampiranInput)
        inputsEl.forEach(el => emptyValue(el));
    })
    const btnSubmit = document.getElementById("btnSubmit");
    const modalContainer = document.getElementById("modals");
    const modalParent = document.getElementById("modalParent");
    const modalChild = document.getElementById("confirm");
    const modalTitle = document.getElementById("titleConfirm");
    const warningMessage = document.getElementById("warnConfirmMessage");
    const contentModal = document.querySelector("#confirm .modal-content > article");
    const btnConfirm = document.getElementById("btnConfirm");
    const btnCloseModal = document.getElementById("btnCloseModal");
    // payloads untuk request
    let payloads;
    // @event
    btnCloseModal.addEventListener("click", () => C_Modal.closeModal(modalContainer, modalParent))
    // @event
    btnSubmit.addEventListener("click", function () {

        let isValid = true;
        // @for
        // @note: jika bisa, lakukan refactoring dengan membungkuskan eksekusi kode looping kedalam function
        for (const { inputId, messageErrorId, validations } of inputsValidator) {
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
                        isValid = false;
                    }
                }
            }
        }
        // cegah konfirmasi popup muncul jika data belum lengkap
        if (isValid === false) return;
        // popup konfirmasi
        C_Modal.setConfirmModal(
            "Pengajuan", "Apakah anda yakin ingin melanjutkan pengiriman pengajuan?",
            {
                modalContainerElement: modalContainer,
                modalParentElement: modalParent,
                modalChildElement: modalChild,
                titleElement: modalTitle,
                warningMessageElement: warningMessage,
                contentModalElement: contentModal,
                buttonConfirm: btnConfirm
            },
            false,
            "blue",
            true
        )
    });
    // @event
    btnConfirm.addEventListener("click", () => {
        payloads = {
            judul: document.getElementById("judulPengajuan").value,
            url: document.getElementById("urlBerita").value,
            tanggalPublikasi: document.getElementById("tanggalPublikasi").value,
            deskripsi: document.getElementById("deskripsi").value,
            lampiran: lampiranInput.files[0] ?? null
        };
        /** Lanjutkan pengiriman data ke Database */
    })
})