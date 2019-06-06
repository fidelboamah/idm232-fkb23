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

$query = "SELECT * FROM `recipe` WHERE id={$eye_dee} LIMIT 1";

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
                while ($recipe =  mysqli_fetch_assoc($result)) {
                    ?>


                <div id="meal-pic">
                    <img src="images/<?php echo $recipe["folder"]?>/<?php echo $recipe["image"] ?>" alt="ingredients" style="width: 100%;">
                </div>
                <div id="meal-desc">
                    <h1 id="m-title"><?php echo $recipe["title"]?></h1>
                    <p id="m-sides"> Sides: <?php echo $recipe["side"]?></p>
                        <div class="details">
                            <i class="d far fa-clock"></i> <p>30 mins</p>
                            <i class="d fas fa-utensils"></i> <p>2 people</p>
                            <i class="d fas fa-burn"></i> <p> 500 calories</p>
                        </div>
                    <p id="m-desc"><?php echo $recipe["description"]?></p>
                </div>
            </div>

            <div class="ingredients">
                <h1>Ingredients</h1>
                <div class="ing-inner">
                <img src="images/<?php echo $recipe["folder"]?>/<?php echo $recipe["ingredientsimage"] ?>" alt="ingredients" />
                    <div class="ind-ing">
                        <?php
                            if ($recipe['ingredients'] !== '')
                            {
                                $i = 0;
                                $ingredients = explode(';', nl2br($recipe['ingredients']));
                                foreach ($ingredients as $ingredient)
                                    {
                                        if ($ingredient !== '') {
                                        $i ++;
                                        echo '<li>'.$ingredient.'</li>';
                                        }
                                    }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div id="process-title">
            <h1>Process</h1>
            </div>

            <div class="process"> 
                <?php
                    $steps = $recipe['steps'];
                    $steps = ltrim($steps, '"');
                    $steps = rtrim($steps, '"');
                    $steps = explode('\\', nl2br($steps));
                    $i = 0;
                        foreach ($steps as $key => $step)
                        {
                            $step = ltrim($step, '[');
                            $step = rtrim($step, ']');
                            $step = explode('|', nl2br($step));
                            $i++;
                                foreach ($step as $key => $value)
                                {
                                    if ($value !== '') {
                                        if ($key % 2 == 0) {
                                            echo '<div class="steps-format">';
                                            echo '<div class="steps">';
                                            echo '<span class="step-num">';
                                            echo $i;
                                            echo '</span>';
                                            echo '<span class="step-title"><b>'.$value.'</b></span>';
                                            }
                                        else
                                            {
                                            echo '<div class="img-4-pro">';
                                            echo '<img src="images/'.$recipe['folder'].'/'.$recipe['stepimage'.$i].'" alt="Step '.$i.'" class="ingsteps">';
                                            echo '<p class="instructions">'.$value.'</p>';                             
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                            }
                                    }
                                }
                        }
                ?>
            </div>
            
            

<?php
}
mysqli_free_result($result);
?>

    <?php 
        include("includes/footer.php"); ?>