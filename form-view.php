<!doctype html>
<?php
$dEmail = $_SESSION["email"];
$dStreet = $_SESSION["street"];
$dStreetNumber = $_SESSION["streetNumber"];
$dCity = $_SESSION["city"];
$dZip = $_SESSION["zip"];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Order food & drinks</title>
</head>
<body>
<div class="container">
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label style="color: <?php echo $errorEmail ?>" for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo $dEmail ?>" />
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label style="color: <?php echo $errorStreet ?>" for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?php echo $dStreet ?>">
                </div>
                <div class="form-group col-md-6">
                    <label style="color: <?php echo $errorStreetNumber ?>" for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php echo $dStreetNumber ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label style="color: <?php echo $errorCity ?>" for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?php echo $dCity ?>">
                </div>
                <div class="form-group col-md-6">
                    <label style="color: <?php echo $errorZip ?>" for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php echo $dZip ?>">
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products AS $i => $product):?>
            <?php if($foodOrDrink == $product['type']):?>
                <label>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br />
            <?php endif; ?>
            <?php endforeach; ?>
        </fieldset>

        <label>
            <input type="checkbox" name="express_delivery" value="5" />
            Express delivery (+ 5 EUR)
        </label>

        <button type="submit" class="btn btn-primary">Order!</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>

