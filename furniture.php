<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
</body>
</html>




<?php
    require_once('mysqli_connect.php');



    $raw_results = mysqli_query($dbc, "SELECT * FROM product
        WHERE (`Category` LIKE '%Furniture%')") or die(mysqli_error());

    // * means that it selects all fields, you can also write: `id`, `title`, `text`
    // articles is the name of our table

    // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
    // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
    // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

    if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following

        while($results = mysqli_fetch_array($raw_results)){
        // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

            echo "<p><h3>".$results['Product_Name']."</h3>".$results['Product_Description']."<h3>".$results['Price_Sell']."</h3></p>";
            // posts results gotten from database(title and text) you can also show id ($results['id'])
        }

    }
    else{ // if there is no matching rows do following
        echo "No results";
    }

?>
