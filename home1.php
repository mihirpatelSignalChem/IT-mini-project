<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#button1").click(function(){
            $("#div_display").load("new_table_data.txt");
            });
        });
    </script>
</head>

<body>
    <h1>Page</h1>
    <div id="div_display"></div>
    <button id="button1"> Get External Content </button>

</body>
</html>