import { Modal } from "./modal-class.js";
const C_Modal = new Modal();
document.addEventListener("DOMContentLoaded", () => {
    const listRiwayatPengajuan = document.getElementById("listRiwayatPengajuan");
    const btnSeeDetails = document.querySelectorAll(".btn-see-details");
    const btnEdit = document.querySelectorAll(".btn-edit");
    const btnDelete = document.querySelectorAll(".btn-delete");
    const modals = document.getElementById("modals");
    const modalParent = document.getElementById("modalParent");
    const btnCloseModal = document.getElementById("btnCloseModal");
    const judul = document.getElementById("judul");
    const status = document.getElementById("status");
    const deskripsi = document.getElementById("deskripsi");
    const media = document.getElementById("media");
    const tanggalUpload = document.getElementById("tanggalUpload");
    const url = document.getElementById("url");
    const revisi = document.getElementById("revisi");
    const confirmedStatus = document.getElementById("confirmedStatus");
    const inputJudul = document.getElementById("updateJudul");
    const inputUrl = document.getElementById("updateUrl");
    const inputTanggalPublikasi = document.getElementById("updateTanggalPublikasi");
    const inputDeskripsi = document.getElementById("updateDeskripsi");
    const modalElementsObject = {
        modalContainerElement: modals,
        modalParentElement: modalParent
    }
    // @loop
    btnSeeDetails.forEach((btn, btnIdx) => {
        // @event
        btn.addEventListener("click", function () {
            const dataPengajuanObj = JSON.parse(listRiwayatPengajuan.querySelectorAll(`article`)[btnIdx].dataset.metaPengajuan);
            const dataModal = this.dataset.modal;
            const modalChildEl = modalParent.querySelector(dataModal);
            const elementsObject = {
                ...modalElementsObject,
                modalChildElement: modalChildEl,
                judulInfoElement: judul,
                statusInfoElement: status,
                urlInfoElement: url,
                deskripsiInfoElement: deskripsi,
                tanggalUploadInfoElement: tanggalUpload,
                mediaInfoElement: media,
                revisiInfoElement: revisi,
                confirmedStatus: confirmedStatus
            }
            C_Modal.setInformationModal(elementsObject, dataPengajuanObj)
        })
    })
    // @loop
    btnEdit.forEach((btn, btnIdx) => {
        // @event
        btn.addEventListener("click", function () {
            const dataPengajuanObj = JSON.parse(listRiwayatPengajuan.querySelectorAll(`article`)[btnIdx].dataset.metaPengajuan);
            const dataModal = this.dataset.modal;
            const modalChild = modalParent.querySelector(dataModal);
            const elementsObject = {
                ...modalElementsObject,
                modalChildElement: modalChild,
                inputJudul: inputJudul,
                inputUrl: inputUrl,
                inputTanggalPublikasi: inputTanggalPublikasi,
                inputDeskripsi: inputDeskripsi,
            }
            C_Modal.setEditModal(elementsObject, dataPengajuanObj)
        })
    })
    const titleModalConfirm = document.getElementById("titleConfirm");
    const warnModalConfirmMessage = document.getElementById("warnConfirmMessage");
    const btnConfirm = document.getElementById("btnConfirm");
    const judulConfirm = document.getElementById("judulInfoConfirm");
    const statusConfirm = document.getElementById("statusInfoConfirm");
    const deskripsiConfirm = document.getElementById("deskripsiInfoConfirm");
    const mediaConfirm = document.getElementById("mediaInfoConfirm");
    const tanggalUploadConfirm = document.getElementById("tanggalUploadInfoConfirm");
    const metaCsrfToken = document.querySelector("meta[name=X-CSRF-TOKEN]").getAttribute("content");
    let deletedIdPengajuan;
    // @loop
    btnDelete.forEach((btn, btnIdx) => {
        // @event
        btn.addEventListener("click", function () {
            const dataPengajuanObj = JSON.parse(listRiwayatPengajuan.querySelectorAll(`article`)[btnIdx].dataset.metaPengajuan);
            const dataModal = this.dataset.modal;
            const modalChild = modalParent.querySelector(dataModal);
            const elementsObject = {
                ...modalElementsObject,
                modalChildElement: modalChild,
                buttonConfirm: btnConfirm,
                titleElement: titleModalConfirm,
                warningMessageElement: warnModalConfirmMessage,
                judulElement: judulConfirm,
                statusElement: statusConfirm,
                deskripsiElement: deskripsiConfirm,
                mediaElement: mediaConfirm,
                tanggalUploadElement: tanggalUploadConfirm
            }
            C_Modal.setConfirmModal("Penghapusan", "Apakah anda yakin ingin menghapus pengajuan ini?", elementsObject, dataPengajuanObj)
            deletedIdPengajuan = this.parentElement.dataset.idPengajuan;
        })
    })
    btnConfirm.addEventListener("click", () => {
        fetch("/dashboard/hapus-pengajuan", {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": metaCsrfToken,
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ idPengajuan: deletedIdPengajuan })
        })
            .then(success => success.json())
            .then(resp => {
                const { status, message } = resp;
                if (status !== 200) return alert(message);
                alert(message)
                window.location.reload();
            })
            .catch(e => console.error(e.message));
    })
    // @event
    btnCloseModal.addEventListener("click", () => C_Modal.closeModal(modals, modalParent))
})