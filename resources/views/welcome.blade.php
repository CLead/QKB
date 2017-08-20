<html>
    <head>
        <script
      src="http://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
    </head>
    <body>
        <h1>AJAX Test</h1>
        <input type="button" id="btnPost" value="Ajax Test">
        <br />
        <span id="output"></span>
        http://toolkit.quad.co.uk/QKB/QKBService.asmx/GetCallLogs
        <script>

        $(document).ready(function()
        {
            $('#output').text('Ready');


            $('#btnPost').on("click", function()
            {
                $.ajax(
                {
                    method: "POST",
                    url: "http://toolkit.quad.co.uk/QKB/QKBService.asmx/GetOutstandingCalls",
                    dataType: "json",
                    success: function (data) 
                        {
                            //var RetVal = data.Password;
                            
                            $('#output').text(data);
                        },
                    error: function (jqXHR, textStatus, errorThrown) 
                        {

                            $('#output').text(errorThrown);
                        }
                });

            });

        })
        </script>

    </body>
</html>