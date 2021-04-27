<?php 
function component($productname, $productprice, $productdesc, $productimg, $productid){
    $element = "

        <section class=\"card-sec\" data-aos=\"fade-left\">
        <form  class=\"card\" action=\"index.php\" method=\"post\">
        <img class=\"images shop-item-image\" src=\"./assets/img/$productimg\" alt=\"\">
        <div class=\"shop-item\">
            <h3 class=\"shop-item-title\">$productname</h3>
            <p>$productdesc</p>
            <span class=\"item-price\">Ksh$productprice</span><br>
            <button type=\"submit\" class=\"btn shop-item-button\" name = \"add\">Buy Now</button>
            <input type='hidden' name='product_id' value='$productid'>
        </div>
        </form>
        </section>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
            <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"cart-row\">
                    <div class=\"cart-item cart-column\">
                        <img class=\"cart-item-image\" src=\"./assets/img/$productimg\" width=\"100\" height=\"100\">
                        <span class=\"cart-item-title\">$productname</span>
                    </div>
                    <span class=\"cart-price cart-column\">Ksh$productprice</span>
                    <div class=\"cart-quantity cart-column\">
                        <input class=\"cart-quantity-input\" type=\"number\" value=\"1\">
                    </div>
                    <button class=\" btn-cart \" type=\"submit\" name=\"remove\">REMOVE</button>
                    </div>
                    
                </form>
    ";
    echo $element;
}

?>