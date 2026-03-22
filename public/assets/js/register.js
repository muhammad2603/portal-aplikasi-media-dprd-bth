// @import
import { classManipulation } from "./class-module.js";
import { InputValidator, removeErrorMessage, setErrorMessage } from "./ClassForms.js";
// call class InputValidator
const C_InputValidator = new InputValidator();
const inputsRule = [
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
        }
    },
    {
        inputId: "email",
        messageErrorId: "errorInputEmail",
        validations: {
            email: [
                {
                    method: "isValidEmail",
                    param: "",
                    errorMessage: "Email tidak sesuai format.",
                    isNegate: true
                }
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
        inputId: "password",
        messageErrorId: "errorInputPassword",
        validations: {
            stringValidation: [
                {
                    method: "isEmptyValue",
                    param: "",
                    errorMessage: "Kata sandi tidak boleh kosong.",
                    isNegate: false
                }
            ],
            password: [
                {
                    method: "isStrongPassword",
                    param: "",
                    errorMessage: "Kata sandi kurang kuat. Kata sandi minimal 8 karakter, setidaknya memiliki 1 huruf besar, angka, dan simbol !, @, #, $, &, *",
                    isNegate: true
                }
            ]
        }
    }
];
// @event
document.addEventListener("DOMContentLoaded", () => {
    const btnSubmitRegis = document.getElementById("btnSubmitRegis");
    const inputNamaLengkap = document.getElementById("namaLengkap");
    const inputEmail = document.getElementById("email");
    const inputNoTelp = document.getElementById("noTelp");
    const inputPassword = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");
    const csrfToken = document.querySelector("meta[name=X-CSRF-TOKEN]").getAttribute("content");
    const iconBtnSubmitRegis = document.getElementById("iconLoading");
    // @event
    inputNoTelp.addEventListener("input", () => C_InputValidator.telephone(inputNoTelp).dashRemove())
    // @event
    btnSubmitRegis.addEventListener("click", function () {
        // @check rules from inputs
        let isInputValid = true;
        for (const { inputId, messageErrorId, validations } of inputsRule) {
            const inputEl = document.getElementById(inputId);
            const errorMessageEl = document.getElementById(messageErrorId);
            removeErrorMessage(errorMessageEl)
            for (const [validator, rules] of Object.entries(validations)) {
                for (const { method, param, errorMessage, isNegate } of rules) {
                    const rawResult = C_InputValidator[validator](inputEl)[method](param);
                    const result = isNegate ? !rawResult : rawResult;
                    if (result && isInputValid === true) {
                        setErrorMessage(errorMessageEl, errorMessage)
                        isInputValid = false;
                    }
                }
            }
        }
        // @check is input invalid detected
        if (isInputValid === false) return;
        // @check password confirm
        if (inputPassword.value !== confirmPassword.value)
            return setErrorMessage(document.getElementById("errorInputConfirmPassword"), "Konfirmasi kata sandi tidak cocok.");
        // @set payloads request
        const payloads = {
            namaLengkap: inputNamaLengkap.value,
            email: inputEmail.value,
            noTelp: inputNoTelp.value,
            password: inputPassword.value,
        }
        classManipulation(iconBtnSubmitRegis).remove("hidden");
        // @fetch
        fetch("/daftar", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                "Content-Type": 'application/json',
            },
            body: JSON.stringify(payloads)
        })
            .then(resp => resp.json())
            .then(data => {
                if (data.status === 200) {
                    window.location.href = data.redirectUri;
                } else {
                    alert(data.message)
                }
            })
            .catch(e => console.error(e.message))
            .finally(() => classManipulation(iconBtnSubmitRegis).add("hidden"))
    })
})