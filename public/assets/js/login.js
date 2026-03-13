import { classManipulation } from './class-module.js';
import { InputValidator } from './ClassForms.js';
const C_InputValidator = new InputValidator();
const inputsEl = [
    {
        inputId: "email",
        validations: {
            stringValidation: [
                {
                    method: "isEmptyValue",
                    param: "",
                    isNegate: false
                }
            ],
            email: [
                {
                    method: "isValidEmail",
                    param: "",
                    isNegate: true
                }
            ]
        }
    },
    {
        inputId: "password",
        validations: {
            stringValidation: [
                {
                    method: "isEmptyValue",
                    param: "",
                    isNegate: false
                }
            ]
        }
    }
];
// @event
document.addEventListener("DOMContentLoaded", () => {
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const rememberMeCheckBox = document.getElementById("rememberMe");
    const btnLogin = document.getElementById("btnLogin");
    const textBtnLogin = btnLogin.querySelector("#text");
    const iconBtnLogin = btnLogin.querySelector("#icon");
    const alertPopUp = document.getElementById("alertPopUp");
    const successElement = document.getElementById("successMessage");
    const successMessage = successElement.querySelector('.message');
    const errorElement = document.getElementById("errorMessage");
    const errorMessage = errorElement.querySelector('.message');
    // @event
    btnLogin.addEventListener("click", () => {
        // @state for loop validations
        let isContinue = true;
        // @loop validation on inputs
        for (const { inputId, validations } of inputsEl) {
            const elementInput = document.getElementById(inputId);
            classManipulation(elementInput).remove("border-red-400")
            classManipulation(elementInput.parentElement).remove("text-red-500")
            for (const [validator, rules] of Object.entries(validations)) {
                for (const { method, param, isNegate } of rules) {
                    const rawResult = C_InputValidator[validator](elementInput)[method](param);
                    const result = isNegate ? !rawResult : rawResult;
                    if (result) {
                        isContinue = false;
                        classManipulation(elementInput.parentElement).add("text-red-500")
                        classManipulation(elementInput).add("border-red-400")
                    }
                }
            }
        }
        // @if check if @state isContinue is false (found invalid input)
        if (isContinue === false) return;
        textBtnLogin.textContent = "Memuat";
        classManipulation(iconBtnLogin).remove("hidden")
        classManipulation(btnLogin).add("pointer-events-none")
        btnLogin.setAttribute("disabled", true)
        // get tokenCsrf from meta
        const tokenCsrf = document.querySelector('meta[name="X-CSRF-TOKEN"]').getAttribute("content");
        const payload = {
            email: emailInput.value,
            password: passwordInput.value,
            remember: rememberMeCheckBox.checked
        }
        // @fetch
        fetch('/login', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": tokenCsrf,
                "X-Requested-With": "XMLHttpRequest",
            },
            body: JSON.stringify(payload)
        })
            .then(resp => resp.json())
            .then(data => {
                const { status, message } = data;
                classManipulation(alertPopUp).remove("translate-y-[-120%]")
                classManipulation(alertPopUp).add("translate-y-4")
                // @if status not OK!
                if (status !== 200) throw new Error(message)
                classManipulation(successElement).remove("hidden")
                classManipulation(successElement).add("flex")
                successMessage.textContent = message;
                // @redirect
                setTimeout(() => window.location.href = '/dashboard', 1000)
            })
            .catch(err => {
                classManipulation(errorElement).remove("hidden")
                classManipulation(errorElement).add("flex")
                errorMessage.textContent = err.message;
            })
            .finally(() => {
                textBtnLogin.textContent = "Login";
                classManipulation(iconBtnLogin).add("hidden")
                setTimeout(() => {
                    classManipulation(alertPopUp).add("translate-y-[-120%]")
                    classManipulation(alertPopUp).remove("translate-y-4")
                }, 3000)
                setTimeout(() => {
                    classManipulation(successElement).add("hidden")
                    classManipulation(errorElement).add("hidden")
                    classManipulation(successElement).remove("flex")
                    classManipulation(errorElement).remove("flex")
                    classManipulation(btnLogin).remove("pointer-events-none")
                    btnLogin.removeAttribute("disabled")
                }, 4000)
            })
    })
})