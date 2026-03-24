import { classManipulation } from './class-module.js';

document.addEventListener('DOMContentLoaded', () => {
    const iconLoading = document.getElementById("iconLoading");
    const messageAktivasi = document.getElementById("messageAktivasi");
    const btnAktivasi = document.getElementById("btnAktivasi");

    btnAktivasi.addEventListener('click', function () {
        classManipulation(iconLoading).remove("hidden")

        fetch("/aktivasi-ulang", {
            method: "GET",
        })
            .then(resp => resp.json())
            .then(data => {
                const { status, message } = data;

                if (status === 200) {
                    classManipulation(messageAktivasi).add("text-green-400")
                    messageAktivasi.textContent = message;
                } else {
                    classManipulation(messageAktivasi).add("text-red-400")
                    messageAktivasi.textContent = message;
                }
            })
            .catch(e => console.error(e.message))
            .finally(() => classManipulation(iconLoading).add("hidden"))
    })
})