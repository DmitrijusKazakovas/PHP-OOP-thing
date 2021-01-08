<?php include("includes/public_header.php"); ?>

<div id="content">

    <h2>Shopping cart</h2>

        <ul class="alerts">
           <?php $this->get_alerts(); ?>
        </ul>

    <form action="" method="post">
        <ul class="cart">
            <?php  $this->get_data('cart_rows') ?>
        </ul>

        <div class="buttons_row">
            <a href="?empty" class="button_alt">Empty Cart</a>
            <input type="submit" name="update" class="button_alt" value="Update Cart">
        </div>
    </form>

    <form action="" method="post">
        <div class="submit_row">
            <input type="submit" name="submit" id="" class="button" value="Pay with Paypal">
        </div>
    </form>

</div>

<?php include("includes/public_footer.php"); ?>
