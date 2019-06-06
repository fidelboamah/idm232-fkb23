<?php 
  include("includes/header.php"); 
  include("includes/db.php"); 
  ?>

<?php
    //   $query = "SELECT * ";
    //   $query .= "FROM `bigsams` ";
    //   $query .= "ORDER BY id ASC";

      $query = "SELECT * FROM `recipe` ORDER BY id ASC";

      $result = mysqli_query($connection, $query);

      if (!$result) {
        die("Database query failed.");
      }
      else echo ("bad man making moves");
    ?>

<style>
@import url('https://fonts.googleapis.com/css?family=Lato:400,700');
$font: 'Lato', sans-serif;

$white: #F5F5F5;
$light: #E0C9CB;
$tan: #C3A1A0;
$pink: #D9AAB7;
$rose: #BA7E7E;
$dark: #4E4E4E;

/* center container in the middle */

body {
  display: grid;
  background: $light;
  font-family: $font, sans-serif;
  text-transform: uppercase;
}

.card {
  position: relative;
  margin: auto;
  overflow: hidden;
  width: 350px;
  height: 630px;
  background: $white;
  box-shadow: 5px 5px 15px rgba($rose, .5);
  border-radius: 10px;
}

/* p {
  font-size: 0.6em;
  color: $rose;
  letter-spacing: 1px;
}

h1 {
  font-size: 1.2em;
  color: $dark;
  margin-top: -5px;
}

h2 {
  color: $tan;
  margin-top: -5px;
} */

img {
  width: 350px;
}

.product {
  position: absolute;
  width: 100%;
  /* height: 100%;
  left: 5%; */
}

.add {
  width: 67%;
}

.pick {
  margin-top: 11px;
  margin-bottom:0;
  margin-left: 20px;
}

.focus{
  background: $rose;
  color: $white;
}

</style>

<body>

        <div class="welcome">
            <!-- <img id="food" src="bck-01.jpg" alt="food"> -->

            <div class="inside" style="width: 100%;height: 100%;">
                <h1> Welcome</h1>
                <div class="srch-ctnr">
                    <input id="searchBar" class="searchbar" type="text" placeholder="Search...">
                </div>
                <p style="font-size: 1.5rem; padding: 3rem 0;">Let's help you find what you're looking for</p>


                    <div class="fltr-box">
                            <label class="fltr">Hot
                                <input type="checkbox" checked="checked">
                                <span class="fltr-btn"></span>
                            </label>
                                              
                            <label class="fltr">Spicy
                                <input type="checkbox">
                                <span class="fltr-btn"></span>
                            </label>
                                              
                            <label class="fltr">Sweet
                                <input type="checkbox">
                                <span class="fltr-btn"></span>
                            </label>
                                              
                            <label class="fltr">Vegan
                                <input type="checkbox">
                                <span class="fltr-btn"></span>
                            </label>
                </div>
            
            </div>

        </div>

        <div class="food-wrapper">
            <div class="food">

                <?php 
                While ($recipe =  mysqli_fetch_assoc($result)) {
                    ?>
                
                <div class="card">
                <a href="recipe.php?id=<?php echo urlencode($recipe["id"]);?>">
                    <div class="images">
                      <img src="images/<?php echo $recipe["folder"]?>/<?php echo $recipe["image"]?>" alt="meal image" />
                    </div>
                    <div class="product" style="padding: 20px;">
                      
                      <h1 style="text-align: left; color: black;";><?php echo $recipe["title"]?></h1>
                      <h2 style="text-align: left; margin: 10px 0; font-size: 1rem; color: gray;"><?php echo $recipe["category"]?></h2>
                      <p class="desc" style="text-align: left;">
                        <?php echo substr("$recipe[description]"."..." ,0,120);?>
                      </p>
                      <button class="add" style="top:0; left:0; position:relative;">Read more</button>
                  </div>
                  </a>
                </div>

                <?php

                }
                mysqli_free_result($result);

                ?>


                <!-- <div class="card">
                    <div class="images">
                      <img src="hm.jpg"/>
                    </div>
                    <div class="product" style="padding: 20px;">
                      
                      <h1 style="text-align: left; color: black;";>Mexican Spiced Pork Chops</h1>
                      <h2 style="text-align: left; margin: 10px 0; font-size: 1rem; color: gray;">Spicy <i class="fas fa-pepper-hot"></i></h2>
                      <p class="desc" style="text-align: left;">These pork chops get vibrant flavor from a coating of Mexican spices, which also form a delicate crust as the pork cooks in a hot pan.</p>
                      <button class="add" style="top:0; left:0; position:relative;">Read more</button>
                  </div>
                </div>

                <div class="card">
                    <div class="images">
                      <img src="hm.jpg"/>
                    </div>
                    <div class="product" style="padding: 20px;">
                      
                      <h1 style="text-align: left; color: black;";>Mexican Spiced Pork Chops</h1>
                      <h2 style="text-align: left; margin: 10px 0; font-size: 1rem; color: gray;">Spicy <i class="fas fa-pepper-hot"></i></h2>
                      <p class="desc" style="text-align: left;">These pork chops get vibrant flavor from a coating of Mexican spices, which also form a delicate crust as the pork cooks in a hot pan.</p>
                      <button class="add" style="top:0; left:0; position:relative;">Read more</button>
                  </div>
                </div>

                <div class="card">
                    <div class="images">
                      <img src="hm.jpg"/>
                    </div>
                    <div class="product" style="padding: 20px;">
                      
                      <h1 style="text-align: left; color: black;";>Mexican Spiced Pork Chops</h1>
                      <h2 style="text-align: left; margin: 10px 0; font-size: 1rem; color: gray;">Spicy <i class="fas fa-pepper-hot"></i></h2>
                      <p class="desc" style="text-align: left;">These pork chops get vibrant flavor from a coating of Mexican spices, which also form a delicate crust as the pork cooks in a hot pan.</p>
                      <button class="add" style="top:0; left:0; position:relative;">Read more</button>
                  </div>
                </div> -->


            </div>
        </div>

    <?php 
        include("includes/footer.php"); 
    ?>

    <?php

   

    ?>