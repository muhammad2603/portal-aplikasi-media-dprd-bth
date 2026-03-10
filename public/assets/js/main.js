import { classManipulation } from './class-module.js';

// @state initialize stateNotif
var stateNotif, notification, btnNotif;

// Document was ready loaded
document.addEventListener("DOMContentLoaded", () => {
  // @mark: Open Dropdown Menu
  const navSettings = document.getElementById("navSettings");
  const settingsDropdown = document.getElementById("settingsDropdown");
  // @event: click
  navSettings.addEventListener("click", function () {
    // class max-height lebih bekerja dan lebih baik digunakan untuk dropdown
    classManipulation(settingsDropdown).toggle("max-h-96");
  });
  // @mark: Open notification
  btnNotif = document.getElementById("btnNotif");
  notification = document.getElementById("notification");
  // @state set stateNotif to false
  stateNotif = false;
  // @event: click
  btnNotif.addEventListener("click", function () {
    // @if buka notifikasi jika state-nya masih tertutup
    if (stateNotif === false) {
      stateNotif = true;
      classManipulation(notification).remove("hidden");
    } else {
      stateNotif = false;
      classManipulation(notification).add("hidden");
    }
  });
  // @mark: notification change status
  const notificationMessage = notification.querySelectorAll(".notification-message > a");
  // @loop notification message
  notificationMessage.forEach((message) => {
    // @event
    message.addEventListener("click", e => {
      // cegah aksi default
      e.preventDefault();
      // ambil value dari atribut data-notification pada elemen pesan notifikasi
      const dataNotif = e.target.dataset.notification;
      // ambil value dari atribut data-read pada elemen pesan notifikasi
      const dataRead = e.target.dataset.read;
      /*
       * @remainder
       * perbarui Notifikasi yang diklik sebagai sudah dibaca jika Notifikasi tersebut belum dibaca
       * selanjutnya, arahkan pengguna ke-halaman yang berkaitan dengan konteks Notifikasi tersebut. contohnya ke-halaman pengajuan
       */
    });
  });

  // @mark: navigation mobile
  const hamburgerMenu = document.getElementById("hamburgerMenu");
  const navContainer = document.getElementById("navContainer");
  const navOverlay = document.getElementById("navOverlay");
  const btnCloseNavMobile = document.getElementById("btnCloseNavMobile");
  // @event
  hamburgerMenu.addEventListener("click", () => {
    classManipulation(navContainer).remove("translate-x-[-100%]")
    classManipulation(navContainer).add("translate-x-0")
  })
  // @event
  btnCloseNavMobile.addEventListener("click", () => {
    classManipulation(navContainer).remove("translate-x-0")
    classManipulation(navContainer).add("translate-x-[-100%]")
  })

});

// @event click
window.addEventListener("click", e => {
  // element target
  const currentElement = e.target;
  // @cond cek apakah elemen target yang diklik adalah elemen tombol notifikasi?
  const isBtnNotifClicked = currentElement === btnNotif;
  // @cond cek apakah parent elemen target yang diklik adalah tombol notifikasi?
  const isParentBtnNotif = currentElement.parentElement === btnNotif;
  // @if jika elemen yang diklik bukan tombol notifikasi dan parentnya bukan tombol notifikasi, maka:
  if (isBtnNotifClicked === false && isParentBtnNotif === false) {
    // @state set stateNotif menjadi false
    stateNotif = false;
    // sembunyikan notifikasi message
    classManipulation(notification).add("hidden");
  }
});
