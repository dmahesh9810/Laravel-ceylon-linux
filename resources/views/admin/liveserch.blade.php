{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
live

<div class="">
    <input type="text" id="search" name="search">
    <button type="button">search</button>
</div>
<script src="jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token()}}'}});
</script>

<script>
    $(document).ready(function(){
        $('#search').on('keyup', function() {

            var value = $(this).val();
            $.ajax({
                type: "get",
                url: "/livesearch",
                data: {'search':value},
                success: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>
</body>
</html> --}}
