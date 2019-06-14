<?php 
  include("includes/header.php"); 
  include("includes/db.php"); 
  ?>

<?php
    $page = $_GET['page'];
    if ($page == '') { $page = 1; }
    $limit = 9;
    $offset = $limit * ($page-1);
    $result = mysqli_query($connection, "SELECT * FROM recipe WHERE title like '%".strtolower(mysqli_real_escape_string($connection, $_GET['look']))."%' OR description like '%".strtolower(mysqli_real_escape_string($connection, $_GET['look']))."%' OR tags like '%".strtolower(mysqli_real_escape_string($connection, $_GET['look']))."%' OR category like '%".strtolower(mysqli_real_escape_string($connection, $_GET['look']))."%' ORDER BY id ASC LIMIT $offset, $limit");
    $i = 0;

      if (!$result) {
        die("Database query failed.");
      }
    //   else echo ("bad man making moves");
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



    <div class="s003" id="size">

    <h1>Search from 40 easy to cook meals</h1>

      <form action="search-menu.php" method=:get">
        <div class="input-select">
      <select data-trigger="" name="look" onchange="this.form.submit()">
        <option value disabled selected>Category</option>
        <option value="Chicken">Chicken</option>
        <option value="Beef">Beef</option>
        <option value="Breakfast">Breakfast</option>
        <option value="Dinner">Dinner</option>
        <option value="Lunch">Lunch</option>
        <option value="Snack">Snack</option>
        <option value="Spicy">Spicy</option>
      </select>
  </div>
</form>

<form action="search-menu.php">
        <div class="inner-form">
          <div class="input-field second-wrap">
            <input id="search" type="text" placeholder="Search..." name="look" value="<?php echo $_GET['look'];?>"/>
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="button">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
      </form>
    </div>

    <script src="js/extention/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>



        <div class="food-wrapper">
            <div class="food">

                <?php 
                While ($recipe =  mysqli_fetch_assoc($result)) {
                    $i++;
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
                  </div>
                  </a>
                </div>


<?php

}
mysqli_free_result($result);

?>

            </div>

    <?php
        if ($i==0)
        {
    ?>
        <div class="error-result">
            <h1 style="color:black;"> Oops! It seems we do not have that recipe available here. </h1>
            <p> Please try searching for another recipe, we have a lot of other options that may still interest you. </p>
        </div>
                 
    <?php
        }
    ?>



        <div class="pages">
    <ul class="pagination">
        <?php
        $show_first = false;
        $current = $_GET['page'];
        if ($current == '') { $current = 1; }
        if ($page == '') { $page = $current; }
        $next = $current +1;
        $previous = $current -1;
        if ($previous <= 0)
        {
            $previous = 1;
        }
        $page = $current;
        $start = $page - 2;
        $end = $page + 1;
        if ($start <= 2)
        {
            $start = 1;
            $end = 5;
            $show_first = false;
        }
        if ($i < 8) {
            $end = $current;
        }
        ?>
        <?php
        if ($current > 1) {
            echo '
                <li><a href="search-menu.php?look='.$_GET['look'].'&page='.$previous.'" class="space">&laquo;</a></li>';
        }
        else {
            echo '
                <li><a href="#">&laquo;</a></li>';
        }
        while ($start <= $end)
        {
            if ($start == $current)
            {
                if ($start=="1")
                {
                    echo '<li><a class="active" href="search-menu.php?look='.$_GET['look'].'">1</a></li>';
                }
                else {
                    echo '<li><a class="active" href="search-menu.php?look='.$_GET['look'].'&page='.$current.'">'.$current.'</a></li>';
                }
            }
            else
            {
                if ($start=="1")
                {
                    echo '<li><a href="search-menu.php?look='.$_GET['look'].'">1</a></li>';
                }
                else{
                    echo '<li><a href="search-menu.php?look='.$_GET['look'].'&page='.$start.'">'.$start.'</a></li>';
                }
            }
            $start ++;
        }
        if ($end != $current) {
            echo '
                <li><a href="search-menu.php?look='.$_GET['look'].'&page='.$next.'">&raquo;</a></li>';
        }
        ?>
    </ul>
</div>

                    </div>
    <?php 
        include("includes/footer.php"); 
    ?>

    <?php

   

    ?>