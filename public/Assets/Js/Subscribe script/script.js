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
const paket = document.querySelector(".paket");
const alamat = document.querySelector(".alamat");
const subsInput = document.querySelector('.subs-input');
const ekpedisiDetail = document.querySelector('.ekspedisi-detail');
console.log(subsInput.value);
iteminit();
dateInit();

$(document).ready(function(){
  // Get Data Kabupaten/kota
  $('select[name="provinsi"]').on('change', function(){
    let provinsiId = $(this).val();
    if(provinsiId){
      jQuery.ajax({
        url:`/provinsi/${provinsiId}/kota`,
        type:"Get",
        dataType:"json",
        success:function(data){
          $('select[name="kabupaten/kota"]').empty();
          $.each(data, function(key, value){
            // console.log(data);
            $('select[name="kabupaten/kota"]').append(`<option value= ${value.city_id} >${value.type} ${value.city_name}</option>`);
          });
        },
      });
    }else{
      $('select[name="kabupaten/kota"]').empty();
      $('select[name="kabupaten/kota"]').append('<option selected value=x>-- Pilih Kabupaten/Kota --</option>');
    }
  })
  
  //Get Data Biaya Ekspedisi
  $('select[name="ekspedisi"]').on('change', function(){
    let kabKotVal = ($('select[name="kabupaten/kota"]').val());
    let beratVal = document.querySelector('#berat').value;
    let ekpedisiVal =($('select[name="ekspedisi"]').val());
    // console.log(kabKotVal, beratVal, ekpedisiVal);
    if(ekpedisiVal != 'x' && kabKotVal != 'x' && beratVal != 'x'){
      jQuery.ajax({
        url:`/asal/255/tujuan/${kabKotVal}/berat/${beratVal}/ekpedisi/${ekpedisiVal}`,
        type:"Get",
        dataType:"json",
        success:function(data){
          $('select[name="paket"]').empty();
          // console.log(data);
          $.each(data, function(key, value){
            // console.log(value.code, value.costs[0].service, value.costs[0].cost[0].value);
            value.costs.forEach( (e, key) => {
              $('select[name="paket"]').append(`<option class="text-capitalize" value= ${key}>${value.code}-${e.service} Rp.${e.cost[0].value} Estimasi ${e.cost[0].etd} hari </option>`);
            });
            if(alamat.value != ''){
              btnCheckout.classList.remove('disabled');
            }
            // $('select[name="kabupaten/kota"]').append('<option value="'+ key + '">' + value.type + " "+ value.city_name + '</option>');
          });
        },
      });
    }else{
      $('select[name="paket"]').empty();
      $('select[name="paket"]').append('<option selected value="x">-- Pilih Paket --</option>');
    }
  })
  $('select[name="kabupaten/kota"]').on('change', function(){
    let kabKotVal = ($('select[name="kabupaten/kota"]').val());
    let beratVal = document.querySelector('#berat').value;
    let ekpedisiVal =($('select[name="ekspedisi"]').val());
    // console.log(kabKotVal, beratVal, ekpedisiVal);
    if(ekpedisiVal != 'x' && kabKotVal != 'x' && beratVal != 'x'){
      jQuery.ajax({
        url:`/asal/255/tujuan/${kabKotVal}/berat/${beratVal}/ekpedisi/${ekpedisiVal}`,
        type:"Get",
        dataType:"json",
        success:function(data){
          $('select[name="paket"]').empty();
          // console.log(data);
          $.each(data, function(key, value){
            // console.log(value.code, value.costs[0].service, value.costs[0].cost[0].value);
            value.costs.forEach( (e, key) => {
              $('select[name="paket"]').append(`<option class="text-capitalize" value= ${key}>${value.code}-${e.service} Rp.${e.cost[0].value} Estimasi ${e.cost[0].etd} hari </option>`);
            });
            if(alamat.value != ''){
              btnCheckout.classList.remove('disabled');
            }
            // $('select[name="kabupaten/kota"]').append('<option value="'+ key + '">' + value.type + " "+ value.city_name + '</option>');
          });
        },
      });
    }else{
      $('select[name="paket"]').empty();
      $('select[name="paket"]').append('<option selected value="x">-- Pilih Paket --</option>');
    }
  })
  $('select[name="provinsi"]').on('change', function(){
    let kabKotVal = ($('select[name="kabupaten/kota"]').val());
    let beratVal = document.querySelector('#berat').value;
    let ekpedisiVal =($('select[name="ekspedisi"]').val());
    // console.log(kabKotVal, beratVal, ekpedisiVal);
    if(ekpedisiVal != 'x' && kabKotVal != 'x' && beratVal != 'x'){
      jQuery.ajax({
        url:`/asal/255/tujuan/${kabKotVal}/berat/${beratVal}/ekpedisi/${ekpedisiVal}`,
        type:"Get",
        dataType:"json",
        success:function(data){
          $('select[name="paket"]').empty();
          // console.log(data);
          $.each(data, function(key, value){
            // console.log(value.code, value.costs[0].service, value.costs[0].cost[0].value);
            value.costs.forEach( (e, key) => {
              $('select[name="paket"]').append(`<option class="text-capitalize" value= ${key}>${value.code}-${e.service} Rp.${e.cost[0].value} Estimasi ${e.cost[0].etd} hari </option>`);
            });
            if(alamat.value != ''){
              btnCheckout.classList.remove('disabled');
            }
            // $('select[name="kabupaten/kota"]').append('<option value="'+ key + '">' + value.type + " "+ value.city_name + '</option>');
          });
        },
      });
    }else{
      $('select[name="paket"]').empty();
      $('select[name="paket"]').append('<option selected value="x">-- Pilih Paket --</option>');
    }
  })

});

paket.addEventListener("change", ()=>{
  if(alamat.value != '' && paket.value != 'x'){
    btnCheckout.classList.remove('disabled');
  } else if( paket.value == 'x' && !btnCheckout.classList.contains('disabled')){
    btnCheckout.classList.add('disabled');
  }
});

alamat.addEventListener("keyup", (event)=>{
  

  if(alamat.value && paket.value != 'x'){
    btnCheckout.classList.remove('disabled');
  } else if( paket.value == 'x' && !btnCheckout.classList.contains('disabled')){
    btnCheckout.classList.add('disabled');
  }

  if (event.key === "Backspace" || event.key === "Delete" ){
    if(alamat.value == ''){
      btnCheckout.classList.add('disabled');
    }
  }
});

alamat.addEventListener("change", (event)=>{
  

  if(alamat.value && paket.value != 'x'){
    btnCheckout.classList.remove('disabled');
  } else if( paket.value == 'x' && !btnCheckout.classList.contains('disabled')){
    btnCheckout.classList.add('disabled');
  }

});

btnConfirm.addEventListener("click", () => {

  const subsValue = subsInput.value;
  const subsDate = document.querySelector('.tanggal').value;
  jQuery.ajax({
    url:`/getDate/${subsValue}/date/${subsDate}`,
    type:"Get",
    dataType:"json",
    success:function(data){
      $('.date-wrapper').empty();
      data.forEach(e => {
          datecol.classList.remove("d-none");
          $(".date-wrapper").append(`<p class="mb-1">${e}</p>`);
          if (btnCheckout.classList.contains("disabled") && alamat.value != '' && paket.value != 'x') {
              btnCheckout.classList.remove("disabled"); 
              }
      });
    },
  });

  // console.log('test')
  // datecol.classList.remove("d-none");
  // if (dateWrap.childElementCount > 0) {
  //   dateWrap.innerHTML = '';
  // }
  // confirmInit();
  // if (btnCheckout.classList.contains("disabled") && alamat.value != '' && paket.value != 'x') {
  //   btnCheckout.classList.remove("disabled");
  // }
});

radioBtn.forEach((e) => {
  e.addEventListener("click", () => {
    if (e.classList.contains("subs")) {
      if (row2.classList.contains("d-none") && row3.classList.contains("d-none")) {
        row2.classList.remove("d-none");
        row3.classList.remove("d-none");
        btnCheckout.classList.add("disabled")
        subsInput.value = 2;
        // console.log(subsInput.value); 
      }
    } else {
      if (!row2.classList.contains("d-none") && !row3.classList.contains("d-none")) {
        row2.classList.add("d-none");
        row3.classList.add("d-none");
        // console.log(subsInput.value);
        subsInput.value = 0;
        console.log(subsInput.value);
        if(alamat.value != '' && paket.value != 'x'){
          btnCheckout.classList.remove("disabled")
        }
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
