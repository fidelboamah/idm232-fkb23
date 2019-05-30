<?php
// redirect 
    function redirect_to($location = NULL) {
        if ($location != NULL) {
            header("Location:{$location}");
            exit;
        }
    }

    // initialize file 