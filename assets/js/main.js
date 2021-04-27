if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready)

}else{
    ready()
}

function ready(){

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for(var i = 0; i < quantityInputs.length; i++){
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)

}

function purchaseClicked(){
    alert('Thank you for your purchase')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    while (cartItems.hasChildNodes()){
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal()
}


function quantityChanged(event){
    var input = event.target
    if(isNaN(input.value) || input.value <= 0){
        input.value = 1
    }
    updateCartTotal()
}

function updateCartTotal() {
    var cartRows = document.getElementsByClassName('cart-row')
    var total=0
    for(var i = 0; i<cartRows.length; i++){
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('Ksh',''))
        var quantity = quantityElement.value
        total = total +(price*quantity)
    }
    document.getElementsByClassName('cart-total-price')[0].innerText = 'Ksh' + total
}
