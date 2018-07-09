<?php

require_once("../pagination.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pagination</title>
        <style>
            .pagination{
                padding: 0;
                list-style: none;
            }
            .pagination li{
                display: inline-block;
            }
            .pagination li:not(:last-child){
                margin-right: 5px;
            }
        </style>
    </head>
    <body>
        <?php
        for ($i = 1; $i <= 18; $i++) {
            echo pagination(["pages" => 18, "page" => $i, "edges" => 5, "show_pages" => 3, "url" => "index.php"]);
            echo "<hr>";
        }
        ?>
    </body>
</html>