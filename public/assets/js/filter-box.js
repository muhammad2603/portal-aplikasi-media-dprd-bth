import { classManipulation } from "/assets/js/class-module.js";
// global variables
var filterSelect;
var currFilterSelect;
let stateFilterBox = false;
// @event document ready
document.addEventListener("DOMContentLoaded", () => {
  filterSelect = document.getElementById("filterSelect");
  const btnFilterBox = document.getElementById("btnFilterBox");
  const childrenFilterSelect = Array.from(filterSelect.children);
  const filterBoxText = document.getElementById("filterText");
  // @event
  window.addEventListener("click", function (e) {
    const currElement = e.target;
    const isCurrElAreChildBtnFilterBox = btnFilterBox.contains(currElement);
    currFilterSelect = filterSelect.getElementsByClassName("active")[0];
    // @if kondisi ini hanya bekerja saat tombol filter-box diklik
    if (isCurrElAreChildBtnFilterBox === true) {
      const checkClassCurrFilterSelect =
        classManipulation(currFilterSelect).contains("bg-gray-100") === false;
      // @if
      if (checkClassCurrFilterSelect) {
        classManipulation(currFilterSelect).add("bg-gray-100");
      }
      /*
       * @note
       * - translate-y-[-16px] disertakan agar tidak menempel ke-elemen yang dapat mempengaruhi animasi
       * - opened dan closed digunakan untuk melakukan pelacakan apakah filter-select ditampilkan atau tidak, memudahkan memanipulasinya pada event-listener window
       */
      classManipulation(filterSelect).toggle(
        "visibility-hidden",
        "pointer-events-none",
        "translate-y-[-16px]",
        "translate-y-0",
        "opacity-100",
        "opened",
        "closed",
      );
    }
    // @if kondisi ini hanya bekerja saat window diklik dan elemennya bukan tombol filter-box ataupun child-nya
    if (
      isCurrElAreChildBtnFilterBox === false &&
      // menentukan elemen filter-select sedang ditampilkan atau tidak agar hanya bekerja saat filter-select memiliki class opened
      classManipulation(filterSelect).contains("opened")
    ) {
      /*
       * @note
       * - translate-y-[-16px] disertakan agar mengembalikan classnya ke-elemen
       * - opened dan closed disertakan agar memudahkan dalam menampilkannya kembali saat tombol filter-box diklik
       */
      classManipulation(filterSelect).toggle(
        "visibility-hidden",
        "pointer-events-none",
        "translate-y-[-16px]",
        "translate-y-0",
        "opacity-100",
        "closed",
        "opened",
      );
    }
  });

  // @loop children di filter-select
  childrenFilterSelect.forEach((item) => {
    // @event
    item.addEventListener("mouseenter", () =>
      classManipulation(currFilterSelect).remove("bg-gray-100"),
    );
    // @event
    item.addEventListener("click", function () {
      const svgFilterOption = this.querySelector("span:has(svg)");
      childrenFilterSelect.forEach((item) => {
        const svgFilterOptions = item.querySelector("span:has(svg)");
        classManipulation(item).remove("bg-gray-100", "active");
        classManipulation(svgFilterOptions).add("hidden");
      });
      classManipulation(this).add("bg-gray-100", "active");
      filterBoxText.textContent = this.textContent;
      classManipulation(svgFilterOption).toggle("hidden");
    });
  });
});
