<?php 

include_once ('database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- <link href="css/style.css" rel="stylesheet">  -->

    <meta charset="utf-8">
    <title>Home Service System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="">

    <link href="assets/img/logoo.png" rel="icon" type="image/png">
    
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/lazy.css">
    <link rel="stylesheet" href="./assets/css/demo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

</head>

<body>

    <?php
    include_once 'nav_bar.php';
    ?>

    <!-- Page Content -->

    <div class="container-fluid">
        
        <center>
            <div class="text-center">
                <div class="mb-5">
                    <h1>Search Services</h1>
                </div>
            </div>
        </center>
        <div class="row">
            <div class="col-md-3">                              
                <!-- <div class="list-group">
                    <h3>Price</h3>
                    <div class="list-group-item checkbox">
                    <label><input type="checkbox" name="minimum_price" value="lowToHigh">Lowest To Highest</label> <br>
                    <label><input type="checkbox" name="maximum_price" value="HighToLow">Highest To Lowest</label>
                    </div>
                </div>  -->         

                <div class="list-group">
                 <h3>Service</h3>

                 <?php

                 $query = "SELECT DISTINCT(fld_service_name) FROM tbl_sp";
                 $statement = $connect->prepare($query);
                 $statement->execute();
                 $result = $statement->fetchAll();
                 foreach($result as $row)
                 {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector service" value="<?php echo $row['fld_service_name']; ?>"  > <?php echo $row['fld_service_name']; ?></label>
                    </div>
                    <?php
                }

                ?>
            </div>
            <div class="list-group">
             <h3>Location</h3>
             <div style="height: 220px; overflow-y: auto; overflow-x: hidden;">
                 <?php

                 $query = "
                 SELECT DISTINCT(fld_location) FROM tbl_sp ORDER BY fld_location DESC
                 ";
                 $statement = $connect->prepare($query);
                 $statement->execute();
                 $result = $statement->fetchAll();
                 foreach($result as $row)
                 {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector location" value="<?php echo $row['fld_location']; ?>" > <?php echo $row['fld_location']; ?></label>
                    </div>
                    <?php    
                }

                ?>
            </div>
        </div>



    </div>

    <div class="col-md-9">
     <br />
     <div class="row filter_data">

     </div>
 </div>
</div>

</div>
<style>
    #loading
    {
     text-align:center; 
     background: url('loading.gif') no-repeat center; 
     height: 300px;
 }
</style>

<script>
    $(document).ready(function(){

        filter_data();

        function filter_data()
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'search_fetch';
            var service = get_filter('service');
            var location = get_filter('location');
            $.ajax({
                url:"search_fetch.php",
                method:"POST",
                data:{action:action, service:service, location:location},
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }

        function get_filter(class_name)
        {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common_selector').click(function(){
            filter_data();
        });

    });
</script>

</body>

</html>
