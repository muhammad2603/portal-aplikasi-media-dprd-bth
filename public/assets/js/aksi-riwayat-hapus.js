import { classManipulation } from './class-module.js';
import { Modal } from './modal-class.js';
const C_Modal = new Modal();
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
    // @loop
    btnRecovery.forEach((btn, btnIdx) => {
        // @event
        btn.addEventListener("click", function () {
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
            };
            classManipulation(status.parentElement).add('hidden')
            C_Modal.setConfirmModal("Pemulihan", "Apakah anda yakin ingin memulihkan pengajuan ini?", elementsObject, dataPengajuanObj, "blue")
        })
    })
    // @loop
    btnDeletePermanent.forEach((btn, btnIdx) => {
        // @event
        btn.addEventListener("click", function () {
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

            classManipulation(status.parentElement).add('hidden')

            C_Modal.setConfirmModal("Hapus Permanen", "Apakah anda yakin ingin menghapus pengajuan ini secara permanen?", elementsObject, dataPengajuanObj)
        })
    })
    // @event
    btnCloseModal.addEventListener("click", () => C_Modal.closeModal(modals, modalParent, btnTextConfirm))

})