function add() {
    var form_container = document.getElementById('form-array-container');
    var item_count_container = document.getElementById('item_count');
    var count = parseInt(item_count_container.innerText)+1;
    item_count_container.innerText = count;
    var previous = form_container.innerHTML;
    var serial = "<div class='row'>\
    <div class='col-md-12 line'>\
    </div>\
    </div>\
    <p class='card-description'>Serial Number "+count+" </p>";
    var row1 = "<div class='row'>\
                <div class='col-md-4'>\
                <div class='form-group row'>\
                    <label class='col-sm-4 col-form-label'>Code</label>\
                        <div class='col-sm-8'>\
                            <input type='text' class='form-control' />\
                        </div>\
                        </div>\
                        </div>\
                        <div class='col-md-8'>\
                            <div class='form-group row'>\
                               <label class='col-sm-3 col-form-label'>Material Description</label>\
                                    <div class='col-sm-9'>\
                                        <input type='text' class='form-control' />  \
                                    </div>\
                                </div> \
                            </div>\
                        </div>";
    var row2 = "<div class='row'>\
      <div class='col-md-4'>\
        <div class='form-group row'>\
          <label class='col-sm-4 col-form-label'>Unit</label>\
          <div class='col-sm-8'>\
            <select class='form-control'>\
              <option>Dozen</option>\
              <option>Inch</option>\
              <option>Kilogram</option>\
              <option>Meter</option>\
              <option>Liter</option>\
              <option>Peice</option>\
            </select>\
          </div>\
        </div>\
      </div>\
      <div class='col-md-4'>\
        <div class='form-group row'>\
          <label class='col-sm-5 col-form-label'>Qty. Requested</label>\
          <div class='col-sm-7'>\
            <input class='form-control' id='qtyreq"+count+"' placeholder='' />\
          </div>\
        </div>\
      </div>\
      <div class='col-md-4'>\
        <div class='form-group row'>\
          <label class='col-sm-5 col-form-label'>Qty. Issued</label>\
          <div class='col-sm-7'>\
            <input class='form-control' id='qtyreq"+count+"' placeholder='' />\
          </div>\
        </div>\
      </div>\
    </div>";

    var row3 = "<div class='row'>\
      <div class='col-md-6'>\
        <div class='form-group row'>\
          <label class='col-sm-3 col-form-label'>Unit Price</label>\
          <div class='col-sm-9'>\
            <div class='input-group'>\
              <input type='text' id='unit"+count+"' oninput='calculate("+count+")' class='form-control' >\
                <div class='input-group-prepend'>\
                  <span class='input-group-text bg-gradient-primary text-white'>Birr</span>\
                </div>\
              </div>\
          </div>\
        </div>\
      </div>\
      <div class='col-md-6'>\
        <div class='form-group row'>\
          <label class='col-sm-3 col-form-label'>Total Price</label>\
          <div class='col-sm-9'>\
          <div class='input-group'>\
              <input type='text' id='total"+count+"' class='form-control'/>\
                <div class='input-group-prepend'>\
                  <span class='input-group-text bg-gradient-primary text-white'>Birr</span>\
                </div>\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>";
    var row4 = "<div class='row'>\
      <div class='col-md-12'>\
        <div class='form-group row'>\
          <label class='col-sm-2 col-form-label'>Remark</label>\
          <div class='col-sm-10'>\
            <input type='text' class='form-control' />\
          </div>\
        </div>\
      </div>\
</div>";
form_container.innerHTML = previous+serial+row1+row2+row3+row4;
}

function calculate(formNum) {
  let unitPrice = document.getElementById("unit"+formNum);
  let reqQuantity = document.getElementById("qtyreq"+formNum);
  let totalPrice = document.getElementById("total"+formNum);
  totalPrice.value = parseFloat(unitPrice.value) * parseFloat(reqQuantity.value);
}