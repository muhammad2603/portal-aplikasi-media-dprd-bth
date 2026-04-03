import { Modal } from "./modal-class.js";
const C_Modal = new Modal();
let deletedIdPengajuan = null;
document.addEventListener("DOMContentLoaded", () => {
    const listRiwayatPengajuan = document.getElementById("listRiwayatPengajuan");
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
    const searchInput = document.getElementById("searchInput");
    const modalElementsObject = {
        modalContainerElement: modals,
        modalParentElement: modalParent
    }
    const titleModalConfirm = document.getElementById("titleConfirm");
    const warnModalConfirmMessage = document.getElementById("warnConfirmMessage");
    const btnConfirm = document.getElementById("btnConfirm");
    const judulConfirm = document.getElementById("judulInfoConfirm");
    const statusConfirm = document.getElementById("statusInfoConfirm");
    const deskripsiConfirm = document.getElementById("deskripsiInfoConfirm");
    const mediaConfirm = document.getElementById("mediaInfoConfirm");
    const tanggalUploadConfirm = document.getElementById("tanggalUploadInfoConfirm");
    const metaCsrfToken = document.querySelector("meta[name=X-CSRF-TOKEN]").getAttribute("content");
    listRiwayatPengajuan.addEventListener("click", e => {
        const btnSeeDetails = e.target.closest("button.btn-see-details");
        const btnEdit = e.target.closest("button.btn-edit");
        const btnDelete = e.target.closest("button.btn-delete");
        // @if jika yang di klik bukan btnSeeDetails, btnEdit, dan btnDelete maka return
        if (!btnSeeDetails && !btnEdit && !btnDelete) return;
        const currPengajuan = e.target.closest("article");
        const dataPengajuanObj = JSON.parse(currPengajuan.dataset.metaPengajuan);
        const dataModal = btnSeeDetails ? btnSeeDetails.dataset.modal : btnEdit ? btnEdit.dataset.modal : btnDelete.dataset.modal;
        const modalChildEl = modalParent.querySelector(dataModal);
        if (dataModal === "#informations") {
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
        } else if (dataModal === "#edit") {
            const elementsObject = {
                ...modalElementsObject,
                modalChildElement: modalChildEl,
                inputJudul: inputJudul,
                inputUrl: inputUrl,
                inputTanggalPublikasi: inputTanggalPublikasi,
                inputDeskripsi: inputDeskripsi
            }
            C_Modal.setEditModal(elementsObject, dataPengajuanObj)
        } else if (dataModal === "#confirm") {
            const elementsObject = {
                ...modalElementsObject,
                modalChildElement: modalChildEl,
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
            const idPengajuanForDelete = btnDelete ? btnDelete.parentElement.dataset.idPengajuan : null;
            deletedIdPengajuan = idPengajuanForDelete;
        }
    })
    searchInput.addEventListener("change", function () {
        const keyword = this.value.toLowerCase();
        fetch(`/dashboard/search-pengajuan?keyword=${encodeURIComponent(keyword)}`, {
            method: "GET",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "X-CSRF-TOKEN": document.querySelector("meta[name=X-CSRF-TOKEN]").getAttribute("content")
            }
        })
            .then(resp => resp.json())
            .then(resp => {
                const { status, message, data_view } = resp;
                if (status !== 200) return alert(message);
                listRiwayatPengajuan.innerHTML = data_view;
            })
            .catch(e => console.error(e.message))
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
    const filterSelect = document.getElementById("filterSelect");
    filterSelect.addEventListener("click", e => {
        searchInput.value = "";
        const filterBy = e.target.closest("button.filter-option").dataset.filterBy;
        fetch("/dashboard/filter-pengajuan?filterBy=" + filterBy, {
            method: "GET",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "X-CSRF-TOKEN": metaCsrfToken
            }
        })
            .then(resp => resp.json())
            .then(resp => {
                const { status, message, data_view } = resp;
                if (status !== 200) return alert(message);
                listRiwayatPengajuan.innerHTML = data_view;
            })
            .catch(e => console.error(e.message))
    })
    // @event
    btnCloseModal.addEventListener("click", () => C_Modal.closeModal(modals, modalParent))
})