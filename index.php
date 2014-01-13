<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <script type="text/javascript" src="bootstrap.min.js"></script>
        <link href="bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-theme.min.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
        <style>
            body {
                width: 100%;
            }
            .page {
                width: 800px;
                height: 500px;
                margin: 0 auto;
            }
            ul {
                list-style: none;
                margin: 0;
                padding: 0 10px;
                height: 130px;
                overflow: auto;
            }
            .chat-wrap {
                height: 170px;
            }
        </style>
        <div class="page">
            <div class="panel panel-primary chat-wrap">
                <div class="panel-heading"><h3 class="panel-title">On-line chat</h3></div>
                <ul id="list"></ul>
            </div>
            <form>
                <label>Name:</label>
                <input id="name" name="name" type="text"/><br>
                <textarea name="text" id="text" cols="30" rows="2"></textarea>
                <input type="button" id="send" value="Send" />
            </form>
        </div>
    </body>
</html>


