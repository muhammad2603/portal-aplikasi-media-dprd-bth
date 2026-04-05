import { classManipulation } from './class-module.js';
import { Modal } from './modal-class.js';
const C_Modal = new Modal();
let stateRecovery = false;
let stateDeletePermanent = false;
let pengajuanId = null;
document.addEventListener("DOMContentLoaded", () => {
    const listRiwayatPengajuan = document.getElementById("listRiwayatPengajuan");
    const btnRecovery = document.querySelectorAll(".btn-recovery");
    const btnDeletePermanent = document.querySelectorAll(".btn-delete-permanent");
    const modals = document.getElementById("modals");
    const modalParent = document.getElementById("modalParent");
    const btnCloseModal = document.getElementById("btnCloseModal");
    const btnTextConfirm = document.getElementById("btnConfirm");
    const titleModalConfirm = document.getElementById("titleConfirm");
    const warnModalConfirmMessage = document.getElementById("warnConfirmMessage");
    const judul = document.getElementById("judulInfoConfirm");
    const status = document.getElementById("statusInfoConfirm");
    const deskripsi = document.getElementById("deskripsiInfoConfirm");
    const media = document.getElementById("mediaInfoConfirm");
    const tanggalUpload = document.getElementById("tanggalUploadInfoConfirm");
    const btnConfirmModal = document.getElementById("btnConfirm");
    const metaCsrfToken = document.querySelector("meta[name='X-CSRF-TOKEN']").getAttribute("content");
    // @loop
    btnRecovery.forEach((btn, btnIdx) => {
        // @event
        btn.addEventListener("click", function () {
            const currBtn = this;
            stateRecovery = true;
            const dataPengajuanObj = JSON.parse(listRiwayatPengajuan.querySelectorAll(`article`)[btnIdx].dataset.metaPengajuan);
            const dataModal = currBtn.dataset.modal;
            const modalChild = modalParent.querySelector(dataModal);
            const elementsObject = {
                modalContainerElement: modals,
                modalParentElement: modalParent,
                modalChildElement: modalChild,
                titleElement: titleModalConfirm,
                warningMessageElement: warnModalConfirmMessage,
                judulElement: judul,
                statusElement: status,
                deskripsiElement: deskripsi,
                mediaElement: media,
                tanggalUploadElement: tanggalUpload,
                buttonConfirm: btnTextConfirm
            };
            const getTargetPengajuanId = parseInt(currBtn.closest("div[data-pengajuan-id]").dataset.pengajuanId);
            classManipulation(status.parentElement).add('hidden')
            C_Modal.setConfirmModal("Pemulihan", "Apakah anda yakin ingin memulihkan pengajuan ini?", elementsObject, dataPengajuanObj, "blue")
            pengajuanId = getTargetPengajuanId;
        })
    })
    // @loop
    btnDeletePermanent.forEach((btn, btnIdx) => {
        // @event
        btn.addEventListener("click", function () {
            stateDeletePermanent = true;
            const dataPengajuanObj = JSON.parse(listRiwayatPengajuan.querySelectorAll(`article`)[btnIdx].dataset.metaPengajuan);
            const dataModal = this.dataset.modal;
            const modalChild = modalParent.querySelector(dataModal);
            const elementsObject = {
                modalContainerElement: modals,
                modalParentElement: modalParent,
                modalChildElement: modalChild,
                titleElement: titleModalConfirm,
                warningMessageElement: warnModalConfirmMessage,
                judulElement: judul,
                statusElement: status,
                deskripsiElement: deskripsi,
                mediaElement: media,
                tanggalUploadElement: tanggalUpload,
                buttonConfirm: btnTextConfirm
            }
            const getTargetPengajuanId = parseInt(this.closest("div[data-pengajuan-id]").dataset.pengajuanId);
            classManipulation(status.parentElement).add('hidden')
            C_Modal.setConfirmModal("Hapus Permanen", "Apakah anda yakin ingin menghapus pengajuan ini secara permanen?", elementsObject, dataPengajuanObj)
            pengajuanId = getTargetPengajuanId;
        })
    })
    btnConfirmModal.addEventListener("click", () => {
        const isStateRecovery = (stateRecovery === true && stateDeletePermanent === false);
        const isStateDeletePermanent = (stateDeletePermanent === true && stateRecovery === false);
        const isPengajuanIdValid = (pengajuanId !== null && typeof pengajuanId === "number");
        if (isStateRecovery && isPengajuanIdValid) {
            fetch('/dashboard/pulihkan-pengajuan', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": metaCsrfToken
                },
                body: JSON.stringify({ pengajuanId: pengajuanId })
            })
                .then(response => response.json())
                .then(data => {
                    const { status, message } = data;
                    if (status === 200) {
                        alert(message);
                        location.reload();
                    } else {
                        throw new Error()
                    }
                })
                .catch(() => alert("Terjadi kesalahan saat memulihkan pengajuan."))
                .finally(() => {
                    stateRecovery = false;
                    stateDeletePermanent = false;
                    pengajuanId = null;
                    C_Modal.closeModal(modals, modalParent, btnTextConfirm)
                })
        }
        if (isStateDeletePermanent && isPengajuanIdValid) {
            fetch('/dashboard/hapus-pengajuan-permanen', {
                method: 'DELETE',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": metaCsrfToken
                },
                body: JSON.stringify({
                    idPengajuan: pengajuanId,
                    isPermanent: true
                })
            })
                .then(response => response.json())
                .then(data => {
                    const { status, message } = data;
                    if (status === 200) {
                        alert(message);
                        location.reload();
                    } else {
                        throw new Error()
                    }
                })
                .catch(() => alert("Terjadi kesalahan saat menghapus pengajuan."))
                .finally(() => {
                    stateRecovery = false;
                    stateDeletePermanent = false;
                    pengajuanId = null;
                    C_Modal.closeModal(modals, modalParent, btnTextConfirm)
                })
        }
    })
    // @event
    btnCloseModal.addEventListener("click", () => {
        C_Modal.closeModal(modals, modalParent, btnTextConfirm)
        stateRecovery = false;
        stateDeletePermanent = false;
        pengajuanId = null;
    })
})