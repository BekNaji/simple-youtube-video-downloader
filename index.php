<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello World</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>
<body>
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                Youtube
            </div>
            <div class="card-body">
                <center>
                <h1>YouTube Downloader</h1>
                <input class="form-control" type="text" name="url" placeholder="URL" id="url"><br>
                <a href="#" class="btn btn-success" id="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing">Go</a>
                </center>
                <hr>
                <div class="result" id="result"></div>

                
            </div>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
//$("#result").html("Hello");

$('#submit').click(function(){
    $('#submit').text("Loading");
    var url = $('#url').val();
    $.ajax(
    {
        url:"get-video.php",
        type:"post",
        data: {url:url},
        success: function(result){
            $('#result').html(result);
            $('#submit').text("Go");
        }
    })
});

});
</script>

</body>
</html>
