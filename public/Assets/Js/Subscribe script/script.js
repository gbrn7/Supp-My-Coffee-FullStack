const dateSelector = document.querySelector(".date-selector");
const radioBtn = document.querySelectorAll(".form-check-input");
const radioLabel = document.querySelectorAll(".form-check-label");
const row2 = document.querySelector(".row-2");
const row3 = document.querySelector(".row-3");
const row4 = document.querySelector(".row-4");
const btnCheckout = row4.querySelector("button");
const btnConfirm = row2.querySelector(".confirm");
const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
  "Juli", "Augustus", "September", "October", "November", "Desember"
];
const dateWrap = row3.querySelector(".date-wrapper");
const datecol = row3.querySelector(".date-col");
iteminit();
dateInit();

btnConfirm.addEventListener("click", () => {
  datecol.classList.remove("d-none");
  if (dateWrap.childElementCount > 0) {
    dateWrap.innerHTML = '';
  }
  confirmInit();
  if (btnCheckout.classList.contains("disabled")) {
    btnCheckout.classList.remove("disabled");
  }
});

radioBtn.forEach((e) => {
  e.addEventListener("click", () => {
    if (e.classList.contains("subs")) {
      if (row2.classList.contains("d-none") && row3.classList.contains("d-none")) {
        row2.classList.remove("d-none");
        row3.classList.remove("d-none");
        btnCheckout.classList.add("disabled")

      }
    } else {
      if (!row2.classList.contains("d-none") && !row3.classList.contains("d-none")) {
        row2.classList.add("d-none");
        row3.classList.add("d-none");
        btnCheckout.classList.remove("disabled")
      }
    }
  });
});


function confirmInit() {
  const valueDate = row2.querySelector(".tanggal").value;
  const range = row2.querySelector(".qty-input").value;
  const date = new Date();
  var item;

  for (let i = 0; i < range; i++) {
    var newDate = new Date(date.setMonth(date.getMonth() + 1));
    if (i == 0) {
      var x = `${date.getDate()} ${monthNames[date.getMonth()]} ${date.getFullYear()}`;
      item = elementFromHtml(`<p class="mb-1">${x}</p>`);
      dateWrap.appendChild(item);
    } else {
      var y = `${valueDate} ${monthNames[newDate.getMonth()]} ${newDate.getFullYear()}`;
      item = elementFromHtml(`<p class="mb-1">${y}</p>`);
      dateWrap.appendChild(item);
    }

  }
}


function elementFromHtml(html) {
  const template = document.createElement("template");

  template.innerHTML = html.trim();

  return template.content.firstElementChild;
}

function dateInit() {
  for (let index = 0; index < 31; index++) {
    const option = document.createElement('option');
    option.setAttribute("value", index + 1);
    option.innerHTML = index + 1;
    dateSelector.appendChild(option);
  }
}

function iteminit() {
  const plusBtn = document.querySelector('.plus');
  plusBtn.addEventListener('click', clickHandler);

  const minusBtn = document.querySelector('.minus');
  minusBtn.addEventListener('click', clickHandler);

}

function clickHandler(event) {
  console.log(event.target);
  var countEl = event.target.parentNode.querySelector(".qty-input");
  if (event.target.classList.contains("plus")) {
    countEl.value = Number(countEl.value) + 1;
  } else {
    if (countEl.value > 2) {
      countEl.value = Number(countEl.value) - 1;
    }
  }
  // triggerEvent(countEl, "change");
}

// function
