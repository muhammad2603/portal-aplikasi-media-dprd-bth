import { classManipulation } from './class-module.js';
import { InputValidator, setErrorMessage } from './ClassForms.js';
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
    const btnLogin = document.getElementById("btnLogin");
    // @event
    btnLogin.addEventListener("click", () => {
        for (const { inputId, validations } of inputsEl) {
            const elementInput = document.getElementById(inputId);
            classManipulation(elementInput).remove("border-red-400")
            classManipulation(elementInput.parentElement).remove("text-red-500")
            for (const [validator, rules] of Object.entries(validations)) {
                for (const { method, param, isNegate } of rules) {
                    const rawResult = C_InputValidator[validator](elementInput)[method](param);
                    const result = isNegate ? !rawResult : rawResult;
                    if (result) {
                        classManipulation(elementInput.parentElement).add("text-red-500")
                        classManipulation(elementInput).add("border-red-400")
                    }
                }
            }
        }

    })

})