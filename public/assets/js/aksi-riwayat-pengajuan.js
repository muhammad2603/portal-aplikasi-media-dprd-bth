import { classManipulation } from './class-module.js';

const setConfirmModal = (title, warningMessage, elementsObject, dataObject) => {
    elementsObject.judulElement.textContent = dataObject.judul;
    elementsObject.statusElement.textContent = dataObject.status;
    elementsObject.deskripsiElement.textContent = dataObject.deskripsi;
    elementsObject.mediaElement.textContent = dataObject.media;
    elementsObject.tanggalUploadElement.textContent = dataObject.tanggalUpload;

    elementsObject.titleElement.textContent = title;
    elementsObject.warnMessageElement.textContent = warningMessage;

    classManipulation(elementsObject.modalContainerElement).remove("invisible")
    classManipulation(elementsObject.modalContainerElement).remove("opacity-0")
    classManipulation(elementsObject.modalContainerElement).add("visible")
    classManipulation(elementsObject.modalContainerElement).add("opacity-100")

    classManipulation(elementsObject.modalParentElement).remove("scale-75")
    classManipulation(elementsObject.modalParentElement).add("scale-100")

    classManipulation(elementsObject.modalChildElement).remove('hidden')

    classManipulation(elementsObject.buttonConfirm).add("text-red-600", "hover:bg-red-50", "hover:border-red-200")
}

const setEditModal = (elementsObject, dataObject) => {
    elementsObject.inputJudul.value = dataObject.judul;
    elementsObject.inputUrl.value = dataObject.url;
    elementsObject.inputTanggalPublikasi.value = dataObject.tanggalPublikasi;
    elementsObject.inputDeskripsi.value = dataObject.deskripsi;

    classManipulation(elementsObject.modalContainerElement).remove("invisible")
    classManipulation(elementsObject.modalContainerElement).remove("opacity-0")
    classManipulation(elementsObject.modalContainerElement).add("visible")
    classManipulation(elementsObject.modalContainerElement).add("opacity-100")

    classManipulation(elementsObject.modalParentElement).remove("scale-75")
    classManipulation(elementsObject.modalParentElement).add("scale-100")

    classManipulation(elementsObject.modalChildElement).remove('hidden')
}

const setInformationModal = (elementsObject, dataObject) => {
    elementsObject.judulInfoElement.textContent = dataObject.judul;
    elementsObject.statusInfoElement.textContent = dataObject.status;
    elementsObject.deskripsiInfoElement.textContent = dataObject.deskripsi;
    elementsObject.mediaInfoElement.textContent = dataObject.media;
    elementsObject.tanggalUploadInfoElement.textContent = dataObject.tanggalUpload;
    elementsObject.urlInfoElement.textContent = dataObject.url;
    elementsObject.revisiInfoElement.textContent = dataObject.revisiCount;
    elementsObject.confirmedByInfoElement.textContent = dataObject.confirmedBy;
    elementsObject.confirmedDateInfoElement.textContent = dataObject.confirmedDate;

    classManipulation(elementsObject.modalContainerElement).remove("invisible")
    classManipulation(elementsObject.modalContainerElement).remove("opacity-0")
    classManipulation(elementsObject.modalContainerElement).add("visible")
    classManipulation(elementsObject.modalContainerElement).add("opacity-100")

    classManipulation(elementsObject.modalParentElement).remove("scale-75")
    classManipulation(elementsObject.modalParentElement).add("scale-100")

    classManipulation(elementsObject.modalChildElement).remove('hidden')
}

const closeModal = (modalContainerElement, modalParentElement) => {
    classManipulation(modals.querySelectorAll("#modalParent > div:not(.hidden)")[0]).add("hidden")

    classManipulation(modalParentElement).add("scale-75")
    classManipulation(modalParentElement).remove("scale-100")

    classManipulation(modalContainerElement).add("invisible")
    classManipulation(modalContainerElement).add("opacity-0")
    classManipulation(modalContainerElement).remove("visible")
    classManipulation(modalContainerElement).remove("opacity-100")
}

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
    const confirmedBy = document.getElementById("confirmedBy");
    const confirmedDate = document.getElementById("confirmedDate");

    const modalElementsObject = {
        modalContainerElement: modals,
        modalParentElement: modalParent
    }

    btnSeeDetails.forEach((btn, btnIdx) => {
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
                confirmedByInfoElement: confirmedBy,
                confirmedDateInfoElement: confirmedDate
            }

            setInformationModal(elementsObject, dataPengajuanObj)
        })
    })

    const inputJudul = document.getElementById("inputJudul");
    const inputUrl = document.getElementById("inputUrl");
    const inputTanggalPublikasi = document.getElementById("inputTanggalPublikasi");
    const inputDeskripsi = document.getElementById("inputDeskripsi");

    btnEdit.forEach((btn, btnIdx) => {
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

            setEditModal(elementsObject, dataPengajuanObj)
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

    btnDelete.forEach((btn, btnIdx) => {
        btn.addEventListener("click", function () {
            const dataPengajuanObj = JSON.parse(listRiwayatPengajuan.querySelectorAll(`article`)[btnIdx].dataset.metaPengajuan);
            const dataModal = this.dataset.modal;
            const modalChild = modalParent.querySelector(dataModal);
            const elementsObject = {
                ...modalElementsObject,
                modalChildElement: modalChild,
                buttonConfirm: btnConfirm,
                titleElement: titleModalConfirm,
                warnMessageElement: warnModalConfirmMessage,
                judulElement: judulConfirm,
                statusElement: statusConfirm,
                deskripsiElement: deskripsiConfirm,
                mediaElement: mediaConfirm,
                tanggalUploadElement: tanggalUploadConfirm
            }

            setConfirmModal("Penghapusan", "Apakah anda yakin ingin menghapus pengajuan ini?", elementsObject, dataPengajuanObj)
        })
    })

    btnCloseModal.addEventListener("click", () => closeModal(modals, modalParent))

})