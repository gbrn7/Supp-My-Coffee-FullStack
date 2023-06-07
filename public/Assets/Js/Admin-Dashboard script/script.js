const body = document.querySelector("body");
const sidebar = body.querySelector(".sidebar");
const toggle = body.querySelector(".toggle");
const modeSwitch = body.querySelector(".toggle-switch");
const modeText = document.querySelector(".mode-text");
const switchh = document.querySelector(".switch");
const produk = document.querySelector(".Produk");


toggle.addEventListener("click", () => {
  sidebar.classList.toggle("close");
  produk.classList.toggle("col-11");
});

modeSwitch.addEventListener("click", () => {
  body.classList.toggle("dark");

  if (body.classList.contains("dark")) {
    modeText.innerHTML = "Light Mode"
  } else {
    modeText.innerHTML = "Dark Mode"
  }
});


$(document).ready(function () {
  $('#jTable').DataTable({
    "ordering": false
  });
});


onload = () => {
  let x = document.querySelector(".sidebar");
  let y = document.querySelector(".footer-wrapper");
  let z = document.querySelector(".content");
  let headBg = document.querySelector(".header-bg");
  let load = document.querySelector(".loading-wrapper");
  setTimeout(() => {
    x.classList.remove("d-none");
    y.classList.remove("d-none");
    z.classList.remove("d-none");
    headBg.classList.remove("d-none");
    load.classList.add("close");
    if (z.classList.contains("main")) {
      new PureCounter();
    }
  }, 500);
};

$( document ).ready(function() {
  body.removeChild(load);
});