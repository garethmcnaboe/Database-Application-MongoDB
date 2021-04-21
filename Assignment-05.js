//function called when same address checkbox changes
function changeSameAddress() {
    var checkbox1 = document.querySelector("input[name=checkbox]");
    //disables the shipping address boxes if the same address checkbox is checked
      if (checkbox1.checked) {
        document.getElementById("shipAddress1").disabled = true;
        document.getElementById("shipAddress2").disabled = true;
        document.getElementById("shipAddressTown").disabled = true;
        document.getElementById("shipAddressCountyorCity").disabled = true;
        document.getElementById("shipAddressEircode").disabled = true;
        sameAddress = true;
        console.log("Same Address Checkbox is checked..");
        console.log(sameAddress);
      //re-enables the shipping address boxes if the same address checkbox is unchecked.
      } 
      else {
        document.getElementById("shipAddress1").disabled = false;  
        document.getElementById("shipAddress2").disabled = false;
        document.getElementById("shipAddressTown").disabled = false;
        document.getElementById("shipAddressCountyorCity").disabled = false;
        document.getElementById("shipAddressEircode").disabled = false;
        sameAddress = false;
        console.log("Same Address Checkbox is not checked..");
        console.log(sameAddress);
      }
  }
  
  //function called to lock and unlock the box to allow user to specify their 'other' title
  function changeTitleFunction(){
    console.log("Change Title function called");      
    personTitle = document.getElementById("title").value;
    if(personTitle == 0){
    document.getElementById("otherTitle").disabled = false;
    }
    else{
    document.getElementById("otherTitle").disabled = true;
    }
  }
  
  //function called when same address checkbox changes
  function changeSameAddressUpdate() {
    var checkbox2 = document.querySelector("input[name=ucheckbox]");
    //disables the shipping address boxes if the same address checkbox is checked
      if (checkbox2.checked) {
        document.getElementById("ushipAddress1").disabled = true;
        document.getElementById("ushipAddress2").disabled = true;
        document.getElementById("ushipAddressTown").disabled = true;
        document.getElementById("ushipAddressCountyorCity").disabled = true;
        document.getElementById("ushipAddressEircode").disabled = true;
        sameAddress = true;
        console.log("Same Address Checkbox is checked..");
        console.log(sameAddress);
      //re-enables the shipping address boxes if the same address checkbox is unchecked.
      } 
      else {
        document.getElementById("ushipAddress1").disabled = false;  
        document.getElementById("ushipAddress2").disabled = false;
        document.getElementById("ushipAddressTown").disabled = false;
        document.getElementById("ushipAddressCountyorCity").disabled = false;
        document.getElementById("ushipAddressEircode").disabled = false;
        sameAddress = false;
        console.log("Same Address Checkbox is not checked..");
        console.log(sameAddress);
      }
  }
  
  //function called to lock and unlock the box to allow user to specify their 'other' title
  function changeTitleFunctionU(){
    console.log("Change Title function called");      
    personTitle = document.getElementById("utitle").value;
    if(personTitle == 0){
    document.getElementById("uotherTitle").disabled = false;
    }
    else{
    document.getElementById("uotherTitle").disabled = true;
    }
  }

  //function to sum the number inputs in the ordercreate.html file
  function calculateTotalPriceC(){
    console.log("total Price method called");
    var price1 = document.getElementById('ocPrice1').value;
    var price2 = document.getElementById('ocPrice2').value;
    var price3 = document.getElementById('ocPrice3').value;
    
    //set value to zero if there is nothing inputted
    if(price1.length === 0){
      price1 = 0;
    }

    if(price2.length === 0){
      price2 = 0;
    }

    if(price3.length === 0){
      price3 = 0;
    }

    //convert string entries to ints
    var price1Int = parseInt(price1);
    var price2Int = parseInt(price2);
    var price3Int = parseInt(price3);
    
    document.getElementById('ocTotalPrice').value = price1Int + price2Int + price3Int;
}

//function to sum the number inputs in the orderupdate.html file
function calculateTotalPriceU(){
  console.log("total Price method called");
  var price1 = document.getElementById('ouPrice1').value;
  var price2 = document.getElementById('ouPrice2').value;
  var price3 = document.getElementById('ouPrice3').value;
  
  //set value to zero if there is nothing inputted
  if(price1.length === 0){
    price1 = 0;
  }

  if(price2.length === 0){
    price2 = 0;
  }

  if(price3.length === 0){
    price3 = 0;
  }

  //convert string entries to ints
  var price1Int = parseInt(price1);
  var price2Int = parseInt(price2);
  var price3Int = parseInt(price3);
  
  document.getElementById('ouTotalPrice').value = price1Int + price2Int + price3Int;
}