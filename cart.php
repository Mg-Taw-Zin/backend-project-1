<?php
include "db.php";
include_once "partials/header.php";
include_once "partials/header-banner.php"
?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!isset($_SESSION['cart'])) {
                        echo "Item Not Found";
                        return;
                    }

                    $total = 0;
                    foreach ($_SESSION['cart'] as $id => $qty) :
                        $result = mysqli_query($db_connection, "SELECT * FROM products WHERE id = $id ");
                        $data = mysqli_fetch_assoc($result);
                        $total = $data['price'] * $qty;

                    ?>

                    <tr>
                        <td class="cart_product">
                            <a href=""><img width="200" src="images/shop/<?php echo $data['image'] ?>" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""><?php echo $data['name'] ?></a></h4>
                            <p>Product ID: <?php echo $data['id'] ?></p>
                        </td>
                        <td class="cart_price">
                            <p><?php echo $data['price'] ?></p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="add-to-cart.php?id=<?php echo $data['id'] ?>"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity"
                                    value="<?php echo $qty ?>" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="drop-to-cart.php?id=<?php echo $data['id'] ?>"> -
                                </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?php echo $total; ?></p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="clear-cart.php?id=<?php echo $data['id'] ?>"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php
                    endforeach
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#do_action-->
<?php
include_once "partials/footer.php"
?>