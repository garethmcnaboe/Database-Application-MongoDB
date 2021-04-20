function calculateTotalPrice(){
        console.log("total Price method called");
        var price1 = document.getElementById('ocPrice1').value;
        var price2 = document.getElementById('ocPrice2').value;
        var price3 = document.getElementById('ocPrice3').value;
        
        var price1Int = parseInt(price1);
        var price2Int = parseInt(price2);
        var price3Int = parseInt(price3);
        
        document.getElementById('ocTotalPrice').value = price1Int + price2Int + price3Int;
}