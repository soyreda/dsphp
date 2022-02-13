<?php
session_start();

if(empty($_SESSION)){
    header("location: Authentification/login.php");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>

    
<div class="card border-secondary   ">
<div class="card bg-dark text-white">
    <h3 class="card-header text-center">Search pictures</h3>
    <div class="card-body text-secondary ">
    <input type="text" id="livesearch" class="mb-5 mt-5 form-control mr-sm-2" placeholder="Search Pictures">
    <div class="row" id="resultsplace">
        
        </div>
    </div>
</div>
</div>
    

    


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




    <script>
        $(document).ready(function() {

            $('#livesearch').keyup(function() {
                var input = $(this).val();
                
                $.ajax({
                    url: "../Models/getPictursSearch.php",
                    method: "POST",
                    data: {
                        input: input
                    },
                    success: function(data) {
                        $('#resultsplace').html(data);
                    }
                });
            });
        });
    </script>


</body>

</html>