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

<!-- Filter by text -->
<!-- <form action="" method="get">
    <input type="search" name="" id=""/>
    <button type="submit">Search</button>
</form> -->

<!-- Filter by type -->
 <div class="card-body" style="width:400px;">
<form class="form" action="?" method="post">
    <!-- Make sure when making a filter list that it contains collumns that actually exist in the table of your database -->
    <select class="form-control" name="type" id="">
        <option class="form-control" value="">Filter By</option>
        <option value="Human">Humans</option>
        <option value="Food">Food</option>
    </select>
    <button class="form-control" type="submit">Apply</button>
</form>
 </div>


<?php

/**
 * The list was collected by the function in the offload.php file! 
 * Here we are just listing the stuff in a list or html manner; 
 * MODIFY THIS ACCORDING TO WHATS IN YOUR DATABASE
 */

 // This while loop will check whether a filter was applied so it knows when to apply the changes 
while($conn->IsfilterApplied()){ 
foreach($conn->listofItems as $item){ 
  echo "<p class='paragraph'> ⚡ " .  $item[1]  . "</p>";
}
exit();
}

?>

