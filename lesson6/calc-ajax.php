<?php
var_dump($_POST);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="" id="form">
    <input type="number" name="firstNumber" id="first" value="0">
    <input type="number" name="secondNumber" id="second" value="0">
    <input type="button" value="*">
    <input type="button" value="/">
    <input type="button" value="+">
    <input type="button" value="-">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    (function($){
        $('#form').on('click', function(event){
            if(event.target.type === "button"){
                let data = {};
                data.operation = event.target.value;
                data.firstNum = $('#first').val();
                data.secondNum = $('#second').val();

                $.ajax({
                    url: 'http://host-2:8888/calculation.php',
                    type: 'POST',
                    data: data,
                    success: function (result) {
                        if($("#result")){
                            $('#result').remove();
                            $("body").append("<p id='result'>" + result + "</p>");
                        }
                    }
                })
            };
        })

    })(jQuery);
</script>
</body>
</html>
