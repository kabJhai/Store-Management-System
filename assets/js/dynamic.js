function add() {
    var form_container = document.getElementById('form-array-container');
    var item_count_container = document.getElementById('item_count');
    var item_count_input = document.getElementById('items-needed');
    var items = parseInt(item_count_input.value);
    item_count_container.innerText = item_count_input.value;
    form_container.innerHTML = "";
    for (let count = 1; count <= items; count++) {
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
                              <input type='text' name='code[]' class='form-control' required/>\
                          </div>\
                          </div>\
                          </div>\
                          <div class='col-md-8'>\
                              <div class='form-group row'>\
                                 <label class='col-sm-3 col-form-label'>Material Description</label>\
                                      <div class='col-sm-9'>\
                                          <input type='text' name='description[]' class='form-control' required/>  \
                                      </div>\
                                  </div> \
                              </div>\
                          </div>";
      var row2 = "<div class='row'>\
        <div class='col-md-4'>\
          <div class='form-group row'>\
            <label class='col-sm-4 col-form-label'>Unit</label>\
            <div class='col-sm-8'>\
              <select name='unit[]' class='form-control' required>\
                <option name='Dozen' >Dozen</option>\
                <option name='Inch' >Inch</option>\
                <option name='Kilogram'>Kilogram</option>\
                <option name='Meter'>Meter</option>\
                <option name='Liter'>Liter</option>\
                <option name='Peice'>Peice</option>\
              </select>\
            </div>\
          </div>\
        </div>\
        <div class='col-md-4'>\
          <div class='form-group row'>\
            <label class='col-sm-5 col-form-label'>Qty. Requested</label>\
            <div class='col-sm-7'>\
              <input class='form-control' name='qty_requested[]' id='qtyreq"+count+"' placeholder='' required/>\
            </div>\
          </div>\
        </div>\
        <div class='col-md-4'>\
          <div class='form-group row'>\
            <label class='col-sm-5 col-form-label'>Qty. Issued</label>\
            <div class='col-sm-7'>\
              <input class='form-control' name='qty_issued[]' id='qtyreq"+count+"' placeholder='' required/>\
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
                <input type='text' id='unit"+count+"' name='unit_price[]' oninput='calculate("+count+")' class='form-control' required >\
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
                <input type='text' id='total"+count+"' name='total_price[]' class='form-control' required/>\
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
              <input type='text' name='remark[]' class='form-control' required/>\
            </div>\
          </div>\
        </div>\
  </div>";
  form_container.innerHTML = previous+serial+row1+row2+row3+row4;
  
    }
}



function addpr() {
  var form_container = document.getElementById('form-array-container');
  var item_count_container = document.getElementById('item_count');
  var item_count_input = document.getElementById('items-needed');
  var items = parseInt(item_count_input.value);
  item_count_container.innerText = item_count_input.value;
  form_container.innerHTML = "";
  for (let count = 1; count <= items; count++) {
    var previous = form_container.innerHTML;
    var serial = "<div class='row'>\
    <div class='col-md-12 line'>\
    </div>\
    </div>\
    <p class='card-description'>Serial Number "+count+" </p>";
    var row1 = "<div class='row'>\
                <div class='col-md-4'>\
                <div class='form-group row'>\
                    <label class='col-sm-4 col-form-label'>ITEM</label>\
                        <div class='col-sm-8'>\
                            <input type='text' name='item[]' class='form-control' required/>\
                        </div>\
                        </div>\
                        </div>\
                        <div class='col-md-8'>\
                            <div class='form-group row'>\
                               <label class='col-sm-3 col-form-label'>Description</label>\
                                    <div class='col-sm-9'>\
                                        <input type='text' name='description[]' class='form-control' required/>  \
                                    </div>\
                                </div> \
                            </div>\
                        </div>";
    var row2 = "<div class='row'>\
      <div class='col-md-4'>\
        <div class='form-group row'>\
          <label class='col-sm-4 col-form-label'>Unit</label>\
          <div class='col-sm-8'>\
            <select name='unit[]' class='form-control' required>\
              <option name='Dozen' >Dozen</option>\
              <option name='Inch' >Inch</option>\
              <option name='Kilogram'>Kilogram</option>\
              <option name='Meter'>Meter</option>\
              <option name='Liter'>Liter</option>\
              <option name='Peice'>Peice</option>\
            </select>\
          </div>\
        </div>\
      </div>\
      <div class='col-md-4'>\
        <div class='form-group row'>\
          <label class='col-sm-5 col-form-label'>Qty</label>\
          <div class='col-sm-7'>\
            <input class='form-control' name='qty[]' placeholder='' required/>\
          </div>\
        </div>\
      </div>\
      <div class='col-md-4'>\
        <div class='form-group row'>\
          <label class='col-sm-5 col-form-label'>Stock Balance</label>\
          <div class='col-sm-7'>\
            <input class='form-control' name='stock_balance[]'  placeholder='' required/>\
          </div>\
        </div>\
      </div>\
    </div>";

    var row4 = "<div class='row'>\
      <div class='col-md-12'>\
        <div class='form-group row'>\
          <label class='col-sm-2 col-form-label'>Remark</label>\
          <div class='col-sm-10'>\
            <input type='text' name='remark[]' class='form-control' required/>\
          </div>\
        </div>\
      </div>\
</div>";
form_container.innerHTML = previous+serial+row1+row2+row4;

  }
}


function addpo() {
  var form_container = document.getElementById('form-array-container');
  var item_count_container = document.getElementById('item_count');
  var item_count_input = document.getElementById('items-needed');
  var items = parseInt(item_count_input.value);
  item_count_container.innerText = item_count_input.value;
  form_container.innerHTML = "";
  for (let count = 1; count <= items; count++) {
    var previous = form_container.innerHTML;
    var serial = "<div class='row'>\
    <div class='col-md-12 line'>\
    </div>\
    </div>\
    <p class='card-description'>Item Number "+count+" </p>";
    var row1 = "<div class='row'>\
                <div class='col-md-4'>\
                <div class='form-group row'>\
                    <label class='col-sm-4 col-form-label'>Part No</label>\
                        <div class='col-sm-8'>\
                            <input type='text' name='part_no[]' class='form-control' required/>\
                        </div>\
                        </div>\
                        </div>\
                        <div class='col-md-8'>\
                            <div class='form-group row'>\
                               <label class='col-sm-3 col-form-label'>Material Description</label>\
                                    <div class='col-sm-9'>\
                                        <input type='text' name='description[]' class='form-control' required/>  \
                                    </div>\
                                </div> \
                            </div>\
                        </div>";
    var row2 = "<div class='row'>\
      <div class='col-md-4'>\
        <div class='form-group row'>\
          <label class='col-sm-4 col-form-label'>Unit</label>\
          <div class='col-sm-8'>\
            <select name='unit[]' class='form-control' required>\
              <option name='Dozen' >Dozen</option>\
              <option name='Inch' >Inch</option>\
              <option name='Kilogram'>Kilogram</option>\
              <option name='Meter'>Meter</option>\
              <option name='Liter'>Liter</option>\
              <option name='Peice'>Peice</option>\
            </select>\
          </div>\
        </div>\
      </div>\
      <div class='col-md-4'>\
        <div class='form-group row'>\
          <label class='col-sm-5 col-form-label'>Qty. Ordered</label>\
          <div class='col-sm-7'>\
            <input class='form-control' name='qty_ordered[]' id='qtyreq"+count+"' placeholder='' required/>\
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
              <input type='text' id='unit"+count+"' name='unit_price[]' oninput='calculate("+count+")' class='form-control' required >\
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
              <input type='text' id='total"+count+"' name='total_price[]' class='form-control' required/>\
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
            <input type='text' name='remark[]' class='form-control' required/>\
          </div>\
        </div>\
      </div>\
</div>";
form_container.innerHTML = previous+serial+row1+row2+row3+row4;

  }
}


function addgrn() {
  var form_container = document.getElementById('form-array-container');
  var item_count_container = document.getElementById('item_count');
  var item_count_input = document.getElementById('items-needed');
  var items = parseInt(item_count_input.value);
  item_count_container.innerText = item_count_input.value;
  form_container.innerHTML = "";
  for (let count = 1; count <= items; count++) {
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
                            <input type='text' name='code[]' class='form-control' required/>\
                        </div>\
                        </div>\
                        </div>\
                        <div class='col-md-8'>\
                            <div class='form-group row'>\
                               <label class='col-sm-3 col-form-label'>Material Description</label>\
                                    <div class='col-sm-9'>\
                                        <input type='text' name='description[]' class='form-control' required/>  \
                                    </div>\
                                </div> \
                            </div>\
                        </div>";
    var row2 = "<div class='row'>\
      <div class='col-md-6'>\
        <div class='form-group row'>\
          <label class='col-sm-4 col-form-label'>Unit</label>\
          <div class='col-sm-8'>\
            <select name='unit[]' class='form-control' required>\
              <option name='Dozen' >Dozen</option>\
              <option name='Inch' >Inch</option>\
              <option name='Kilogram'>Kilogram</option>\
              <option name='Meter'>Meter</option>\
              <option name='Liter'>Liter</option>\
              <option name='Peice'>Peice</option>\
            </select>\
          </div>\
        </div>\
      </div>\
      <div class='col-md-6'>\
        <div class='form-group row'>\
          <label class='col-sm-5 col-form-label'>Quantity </label>\
          <div class='col-sm-7'>\
            <input class='form-control' name='qty[]' id='qtyreq"+count+"' oninput='calculateQuantity("+count+")' placeholder='' required/>\
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
              <input type='text' id='unit"+count+"' name='unit_price[]' oninput='calculate("+count+")' class='form-control' required >\
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
              <input type='text' id='total"+count+"' name='total_price[]' class='form-control' required/>\
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
            <input type='text' name='remark[]' class='form-control' required/>\
          </div>\
        </div>\
      </div>\
</div>";
form_container.innerHTML = previous+serial+row1+row2+row3+row4;

  }
}


function checkValues() {
  password = document.getElementById("password").value;
  cpassword = document.getElementById("cpassword").value;
  if(password==cpassword){
    document.getElementById("submit").removeAttribute("disabled")
    document.getElementById("submit").innerText = "REGISTER"
  }else{
    document.getElementById("submit").setAttribute("disabled","")
    document.getElementById("submit").innerText = "Password Doesnot match"
  }
}

function calculateQuantity(formNum) {
  let totalSum = document.getElementById("total_quantity");
  let sum = 0;
  for (let index = 1; index <= formNum; index++) {
    sum = sum + parseInt(document.getElementById("qtyreq"+index).value);
  }
  totalSum.value = sum; 
}
function calculatePO(formNum) {
  let reqQuantity = document.getElementById("qtyreq"+formNum);
  let totalPrice = document.getElementById("total"+formNum);
  let totalSum = document.getElementById("total_sum");
  let totalTax = document.getElementById("total_tax");
  let netBirr = document.getElementById("net_birr");
  let sum = 0.0;
  totalPrice.value = parseFloat(unitPrice.value) * parseFloat(reqQuantity.value);
  for (let index = 1; index <= formNum; index++) {
    sum = sum + parseFloat(document.getElementById("total"+index).value);
  }
  totalSum.value = sum; 
  totalTax.value = sum*0.15;
  netBirr.value = parseFloat(totalSum.value) + parseFloat(totalTax.value);

}

function calculate(formNum) {
  let unitPrice = document.getElementById("unit"+formNum);
  let reqQuantity = document.getElementById("qtyreq"+formNum);
  let totalPrice = document.getElementById("total"+formNum);
  totalPrice.value = parseFloat(unitPrice.value) * parseFloat(reqQuantity.value);
}