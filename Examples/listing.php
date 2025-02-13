<?php

/**
 * ENTRY POINT FOR TESTING PURPOSES LOL
 * @author Milton Vafana <miltonhyndrex@gmail.com>
 * @github <https://www.github.com/nia-cloud-official>
 */

// This file contains all the environment variables
require './../src/env.php';
// This file contains all necessary file imports and declarations
include './../src/offload.php';

?>

<head>
    <link rel="stylesheet" href="./../assets/bootstrap.css">
</head>

<br><br><br><br>
 <?php while ($conn->collectList()) {
        foreach ($conn->allItems as $item) {?>
<form action="?" method="post">
<section class="schedule">
    <div class="container">
        <div class="schedule-inner" style="border:none;padding:10px;box-shadow: 1px 1px 2px 1px black;">
            <div class="row">
              <div class="col-lg-4 col-md-6 col-12 ">
                    <div class="single-schedule first">
                        <div class="inner">
                            <div class="single-content">
                                <span>Milton Vafana</span>
                                <h4><?php echo $item[1]; ?></h4>
                                <p><?php echo $item[2];?></p>
                                    <button type="submit" name="like" class="btn btn-alert"><?php echo $item[3];?>❤️</button>
                                    <button type="submit" name="dislike" class="btn btn-alert"><?php echo $item[3];?>💔</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<br><br><?php }
        exit();
    }
?>
                                



    <?php

    /**
     * The list was collected by the function in the offload.php file! 
     * Here we are just listing the stuff in a list or html manner; 
     * MODIFY THIS ACCORDING TO WHATS IN YOUR DATABASE
     */
    // This while loop will check whether a filter was applied so it knows when to apply the changes 
    ?>
