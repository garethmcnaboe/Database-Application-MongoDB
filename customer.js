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