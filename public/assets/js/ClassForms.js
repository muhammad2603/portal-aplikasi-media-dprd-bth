import { classManipulation } from "./class-module.js";
/*
 * @funct _convertSizeToMB
 * @param size {int}: ukuran asli file gambar
 *
 * @return int hasil konversi dari ukuran asli (KB) ke MB
 */
const _convertSizeToMB = (size) => {
  return size * 1024 * 1024;
};
const showPreview = (currImgElement, previewElement) => {
  classManipulation(previewElement).remove("hidden");
  if (currImgElement !== null) {
    classManipulation(currImgElement).add("hidden");
  }
};
const hidePreview = (currImgElement, figureImagePreview) => {
  classManipulation(figureImagePreview).add("hidden");
  if (currImgElement !== null) {
    classManipulation(currImgElement).remove("hidden");
  }
  figureImagePreview.querySelector("img").src = "";
};
const setErrorMessage = (element, errorMessage) => (element.textContent = errorMessage);
const removeErrorMessage = (element) => (element.textContent = "");
// kosongkan value input
const emptyValue = (inputElement) => (inputElement.value = "");
// kembalikan value default pada input dengan value pada atribut data-default-value
const setDefaultValue = (inputElements) =>
  inputElements.forEach((input) => {
    if (input.dataset.defaultValue === undefined)
      console.warn(
        `Warning: ${input} tidak memiliki atribut data-default-value, value akan dikosongkan`,
      );
    input.value = input.dataset.defaultValue ?? "";
  });
const getDate = (target = null) => (target === null ? new Date() : new Date(target));
// @class ImageFile
class ImageFile {
  constructor(fileObject) {
    this.file = fileObject;
    this.name = fileObject?.name;
    this.nameLength = fileObject?.name.length;
    this.mime = fileObject?.type;
    this.size = fileObject?.size;
  }
  isFileExist() {
    return this.file !== undefined;
  }
  validateSizeImage() {
    return {
      isImgTooLarge: (maxSize) => this.size > _convertSizeToMB(maxSize),
      isImgCorrupted: () => this.size === 0,
    };
  }
  isAllowedExtensions(extensions = []) {
    try {
      if (!extensions || !Array.isArray(extensions))
        throw new Error(
          "Argument {extensions} dibutuhkan dan memiliki tipe Array.",
        );
      if (extensions.length === 0)
        throw new Error(
          "Argument {extensions} setidaknya memiliki 1 item didalam Array.",
        );
      return extensions.includes(this.mime);
    } catch (err) {
      console.error("Error:", err.message);
    }
  }
  setImagePreview(currImgElement, figureImagePreview) {
    const imageUrl = URL.createObjectURL(this.file);
    showPreview(currImgElement, figureImagePreview);
    figureImagePreview.querySelector("img").src = "";
    figureImagePreview.querySelector("img").src = imageUrl;
  }
  checkError() {
    if (!this.file) throw new Error("constructor fileObject tidak ditemukan.");
  }
}

class InputValidator {
  stringValidation(input) {
    return {
      value: input.value,
      isEmptyValue: function () {
        return this.value.trim() === "" || this.value.trim().length === 0;
      },
      isShortValue: function (min) {
        return this.value.length > 0 && this.value.length < min;
      },
      isLongValue: function (max) {
        return this.value.length > max;
      },
      isInvalidValue: function (charsInvalid = /[^a-z \.]/gi) {
        return charsInvalid.test(this.value);
      },
    };
  }
  date(input) {
    return {
      value: input.value,
      isValidDate: function () {
        return !(getDate(this.value) > getDate()) || getDate(this.value).getDate() === getDate().getDate();
      },
      isValidAge: function (minAge) {
        return !(getDate().getFullYear() - getDate(this.value).getFullYear() < minAge);
      }
    }
  }
  address(input) {
    return {
      value: input.value,
      isValidAddress: function () {
        return !/[^a-z0-9\s,\.\/\-#\(\)]+/gi.test(this.value);
      },
    };
  }
  telephone(input) {
    return {
      tel: input.value,
      // validasi nomor telpon jika formatnya tidak sesuai dan mengandung karakter selain digit angka
      isValidNumber: function () {
        return /^08\d{8,11}$/g.test(this.tel);
      },
      dashRemove: function () {
        input.value = this.tel.replaceAll(/-/g, "");
      },
    };
  }
}

export {
  ImageFile,
  InputValidator,
  setErrorMessage,
  removeErrorMessage,
  showPreview,
  hidePreview,
  emptyValue,
  setDefaultValue,
};
