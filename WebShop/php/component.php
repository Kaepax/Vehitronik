<?php

function component($productname, $productprice, $productimage, $productid) {
    $element="
    <form action=\"index.php\" method=\"post\">
    <img src=\"$productimage\" class=\"card-img-top\" width=\"100\" height=\"200\" alt=\"abc\">
    <div class=\"card-body\">
        <h5 class=\"card-title\">$productname</h5>
        <p class=\"card-text\">$$productprice</p>
        <button type='submit' class=\"btn btn-primary my-3\" name=\"add\">Buy product</button>
        <input type='hidden' name='product_id' value='$productid'>
    </div>
    </form>
    ";
    echo $element;
}

function cartElement($productImage, $productName, $productPrice, $productId) {
    $element = "
    <form action=\"cart.php?action=remove&id=$productId\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productImage alt=\"hulajnoga\" class=\"card-img-top img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productName</h5>
                                <small class=\"text-secondary\">Seller: Vehitronik</small>
                                <h5 class=\"pt-2\">$$productPrice</h5>
                              
                                
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                <button type=\"submit\" class=\"btn btn-danger mx-2 float-end\" name=\"remove\">Remove</button>
                                
<!--                                    i tags aren't working-->
<!--                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\">-</i></button> -->
<!--                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\"> -->
<!--                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\">+</i></button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    ";
    echo $element;
}