<div class="row g-5">

    <?php
    if (isset($_SESSION['user_bill'])) {
        $name = $_SESSION['user_bill']['user'];
        $address = $_SESSION['user_bill']['address'];
        $email = $_SESSION['user_bill']['email'];
        $phone = $_SESSION['user_bill']['phone_number'];
    } else {
        $name = "";
        $address = "";
        $email = "";
        $phone_number = "";
    }
    ?>
    <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <?php
            if (isset($_SESSION['mycart_bill']))
                echo '<span class="badge bg-primary rounded-pill">' . count($_SESSION['mycart_bill']) . '</span>'
            ?>

        </h4>
        <ul class="list-group mb-3">
          
              
                    <?php
                    $sum = 0;
                    $i = 0;
                    foreach ($_SESSION['mycart_bill'] as $cart) {
                        $hinh = $cart[2];
                        $total = $cart[3] * $cart[4];
                        $sum += $total;
                    ?>
                      <li class="list-group-item d-flex justify-content-between lh-sm">
                      <div>
                    <h6 class="my-0">Product name</h6>
                        <small class="text-muted"><?= $cart[1] ?></small>
               
                <span class="text-muted">$<?= $cart[3] ?></span>
                </div>
                </li>
            <?php
                        $i += 1;
                    }
            ?>
          
         

            <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>$<?= $sum  ?></strong>
            </li>
        </ul>


    </div>
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate="" action="index.php?act=bill_comfirm" method="post">
            <div class="row g-3">
                <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="username" name="user" value="<?= $name  ?>" placeholder="Username" required>
                        <div class="invalid-feedback">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $email  ?>" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= $address  ?>" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>
                <div class="col-12">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?= $phone  ?>" placeholder="+84" required>
                    <div class="invalid-feedback">
                        Please enter your shipping phone.
                    </div>
                </div>

               

              
            </div>
            <div class="col-md-5">
                <label for="Payment_methods" class="form-label">Payment_methods</label>
                <select class="form-select" id="Payment_methods" required="" name="payment_methods">
                    <option value="" selected disabled>payment methods</option>
                    <option value="Pay on delivery">Pay on delivery</option>
                    <option value="Bank transfer upon receipt">Bank transfer upon receipt</option>
                    <option value="Online payment">Online payment</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid country.
                </div>
            </div>
            <hr>



            <button class="w-100 btn btn-primary btn-lg" type="submit" name="agree_to_order">Continue to checkout</button>
        </form>
    </div>
</div>