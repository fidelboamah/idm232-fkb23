<?php 
        include("includes/header.php"); 
?>

<body>
    <div class="container">

        <div class="PIC">
            <img src="img/newone-01.jpg" alt="Snow" style="width:100%;">
            <div class="centered">
                <h1>Welcome to our kitchen!</h1>
                <a href="menu-test.php" style="text-decoration: none; color: white;">
                <div class="explore-btn">
                    <p>Explore our recipes</p>
                </div>
                </a>
            </div>
        </div>

        <div class="content-wrapper">
            <div class="content">
                <div class="exp" id="a">
                    <h2>Choose your meals</h2>
                    <br>
                    <p> Our chef-designed recipes include balanced Mediterranean meals, quick one-pan dinners, and top-rated customer favorites.</p>
                </div>
                <div class="comp" id="b">
                    <img style="width: 50%;" src="img/food.jpg">
                </div>

                <div class="exp" id="c">
                    <h2>Unpack your box</h2>
                    <br>
                    <p>We guarantee the freshness of all our ingredients and deliver them in an insulated box right to your door.</p>
                </div>
                <div class="comp" id="d">
                    <img style="width: 50%;" src="img/food.jpg">
                </div>

                <div class="exp" id="e">
                    <h2>Create magic</h2>
                    <br>
                    <p>Following our step-by-step instructions you’ll experience the magic of cooking recipes that our chefs create with your family’s tastes in mind.</p>
                </div>
                <div class="comp" id="f">
                    <img style="width: 50%;" src="img/food.jpg">
                </div>
            </div>
        </div>

        <div class="dnt-wait" id="e">
            <h1>What are you waiting for?</h1>
            <br>
            <p> All our recipes are available to you right now and all for free. Yes, zero dollars. We want you to start eating the right way, the healthy way and that should not come at a cost to you. So please go ahead and check out what we have to offer.</p>
            <a href="menu-test.php" style="text-decoration: none; color: white;">
            <div class="explore-btn">
                <p id="dnt-btn">Explore our recipes</p>
            </div>
            </a>
        </div>

        <?php 
            include("includes/footer.php");
        ?>

