<?php 
  include("includes/header.php"); 
  include("includes/db.php"); 

    //   $query = "SELECT * ";
    //   $query .= "FROM `bigsams` ";
    //   $query .= "ORDER BY id ASC";

    //   $query = "SELECT * FROM `bigsams` ORDER BY id ASC";

    //   $result = mysqli_query($connection, $query);

    //   if (!$result) {
    //     die("Database connection failed.");
    //   }
    //   else echo ("bad man making moves");



$eye_dee = isset($_GET['id']) ? $_GET['id'] : null;

// if(!isset($_GET['id'])) {
//     redirect_to("index.php");
// } else {
//     $query = SELECT `id` FROM `bigsams` WHERE `id` = $_GET[`id`];

// }


If (!eye_dee) {
	redirect_to(“index.php”);
} else { echo ("hahahaha");

$query = "SELECT * FROM `bigsams` WHERE id={$eye_dee} LIMIT 1";

$result = mysqli_query($connection, $query);
}

echo ("in a bit");

if (!$result) {
    die("Database query failed.");
  }
  else echo ("kojo");

?>
        <div class="recipe-wrapper">
                <!-- <button onclick="goBack()">Go Back</button> -->
<!-- 
                <script>
                function goBack() {
                  window.history.back();
                }
                </script> -->


        
            <div class="recipe">

            <?php 
                While ($recipe =  mysqli_fetch_assoc($result)) {
                    ?>


                <div id="meal-pic">
                    <img src="hm.jpg" alt="meal" style="width: 100%;">
                </div>
                <div id="meal-desc">
                    <h1 id="m-title"><?php echo $recipe["title"]?></h1>
                        <div class="details">
                            <i class="d far fa-clock"></i> <p>30 mins</p>
                            <i class="d fas fa-utensils"></i> <p>2 people</p>
                            <i class="d fas fa-burn"></i> <p> 500 calories</p>
                        </div>
                    <p id="m-desc"><?php echo $recipe["parag"]?></p>
                </div>
            </div>

            <div class="ingredients">
                <h1>Ingredients</h1>
                <div class="ing-inner">
                <img src="ing.jpg" alt="ingredients">
                    <div class="ind-ing">
                    <?php echo $recipe["ing_list"]?>
                    </div>
                </div>
            </div>

            <div id="process-title">
            <h1>Process</h1>
            </div>
            
            <div class="process">
                <div class="steps-format">
                <div class="img-4-pro">
                    <img src="uno.jpg" alt="meal">
                </div>
                <div class="steps">
                    <span class="step-num">1</span>
                    <span class="step-title"><b>Cook the barley:</b></span>
                </div>
                <p class="instructions">
                    Fill a large pot with salted water; cover and heat to boiling on high. Once boiling, add the barley. Cook, uncovered, 28 to 30 minutes, or until tender. Turn off the heat. Drain thoroughly and return to the pot.
                </p>
                </div>

                <div class="steps-format">
                        <div class="img-4-pro">
                            <img src="dos.jpg" alt="meal">
                        </div>
                        <div class="steps">
                            <span class="step-num">2</span>
                            <span class="step-title"><b>Prepare the ingredients:</b></span>
                        </div>
                        <p class="instructions">
                            While the barley cooks, wash and dry the fresh produce. Cut off and discard the stems of the peppers; remove the cores. Halve lengthwise, then thinly slice crosswise. Peel and roughly chop 2 cloves of garlic. Thinly slice the scallions, separating the white bottoms and hollow green tops. Halve the tomatoes; place in a medium bowl and season with salt and pepper. 
                        </p>
                </div>

                <div class="steps-format">
                        <div class="img-4-pro">
                            <img src="tres.jpg" alt="meal">
                        </div>
                        <div class="steps">
                            <span class="step-num">3</span>
                            <span class="step-title"><b>Cook the peppers:</b></span>
                        </div>
                        <p class="instructions">
                            While the barley continues to cook, in a medium pan (nonstick, if you have one), heat a drizzle of olive oil on medium-high until hot. Add the sliced peppers; season with salt and pepper. Cook, stirring occasionally, 2 to 3 minutes, or until slightly softened. Add the chopped garlic and sliced white bottoms of the scallions; season with salt and pepper. Cook, stirring occasionally, 1 to 2 minutes, or until softened. Transfer to the bowl of seasoned tomatoes. Wipe out the pan. 
                        </p>
                </div>

                <div class="steps-format">
                        <div class="img-4-pro">
                            <img src="cua.jpg" alt="meal">
                        </div>
                        <div class="steps">
                            <span class="step-num">4</span>
                            <span class="step-title"><b>Cook the pork:</b></span>
                        </div>
                        <p class="instructions">
                            Pat the pork dry with paper towels. Season on both sides with salt, pepper, and enough of the spice blend to coat (you may have extra). In the same pan, heat a drizzle of olive oil on medium-high until hot. Add the seasoned pork and cook 4 to 6 minutes per side, or until browned and cooked through. Transfer to a cutting board and let rest at least 5 minutes. 
                        </p>
                </div>

                <div class="steps-format">
                        <div class="img-4-pro">
                            <img src="cin.jpg" alt="meal">
                        </div>
                        <div class="steps">
                            <span class="step-num">5</span>
                            <span class="step-title"><b>Finish the barley & serve your dish:</b></span>
                        </div>
                        <p class="instructions">
                            To the pot of cooked barley, add the pepper-tomato mixture, tomatillo sauce, and a drizzle of olive oil. Season with salt and pepper and stir to combine. Slice the rested pork crosswise. Serve the sliced pork over the finished barley. Garnish with the cheese and sliced green tops of the scallions. Enjoy! 
                        </p>
                </div>
                
            </div>
        </div>

    <?php

}
mysqli_free_result($result);

?>

    <?php 
        include("includes/footer.php"); ?>