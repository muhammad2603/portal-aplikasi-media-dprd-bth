import { classManipulation } from "./class-module.js";

class Modal {
    setConfirmModal(title, warningMessage, elementsObject, dataObject, buttonConfirmStyle = "red") {
        elementsObject.judulElement.textContent = dataObject.judul;
        elementsObject.statusElement.textContent = dataObject.status;
        elementsObject.deskripsiElement.textContent = dataObject.deskripsi;
        elementsObject.mediaElement.textContent = dataObject.media;
        elementsObject.tanggalUploadElement.textContent = dataObject.tanggalUpload;

        elementsObject.titleElement.textContent = title;
        elementsObject.warningMessageElement.textContent = warningMessage;

        classManipulation(elementsObject.modalContainerElement).remove("invisible")
        classManipulation(elementsObject.modalContainerElement).remove("opacity-0")
        classManipulation(elementsObject.modalContainerElement).add("visible")
        classManipulation(elementsObject.modalContainerElement).add("opacity-100")

        classManipulation(elementsObject.modalParentElement).remove("scale-75")
        classManipulation(elementsObject.modalParentElement).add("scale-100")

        classManipulation(elementsObject.modalChildElement).remove('hidden')

        if (buttonConfirmStyle === "red") classManipulation(elementsObject.buttonConfirm).add("text-red-600", "hover:bg-red-50", "hover:border-red-200");
        if (buttonConfirmStyle === "blue") classManipulation(elementsObject.buttonConfirm).add("text-blue-600", "hover:bg-blue-50", "hover:border-blue-200");
    }

    setEditModal(elementsObject, dataObject) {
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

    setInformationModal(elementsObject, dataObject) {
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

    closeModal(modalContainerElement, modalParentElement, buttonConfirm = null) {
        classManipulation(modalContainerElement.querySelectorAll("#modalParent > div:not(.hidden)")[0]).add("hidden")

        classManipulation(modalParentElement).add("scale-75")
        classManipulation(modalParentElement).remove("scale-100")

        classManipulation(modalContainerElement).add("invisible")
        classManipulation(modalContainerElement).add("opacity-0")
        classManipulation(modalContainerElement).remove("visible")
        classManipulation(modalContainerElement).remove("opacity-100")

        if (buttonConfirm !== null) classManipulation(buttonConfirm).remove("text-blue-600", "hover:bg-blue-50", "hover:border-blue-200", "text-red-600", "hover:bg-red-50", "hover:border-red-200")
    }
}

export { Modal };