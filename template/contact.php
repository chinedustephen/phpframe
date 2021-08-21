<html>

<head>
    <title>Application</title>

    <style>
        body{
            background-color: #cecece;
        }

        .middleBox{
            margin: auto;
            max-width: 500px;
            background-color: #fff;
            box-shadow: 1px 1px 10px #000;
            /*margin-top: 20%;*/
            min-height: 500px;
        }

        .row{
            margin: auto;
            width: 80%;
            margin-top: 20px;
            display: inline-block;
        }

        .leftRow, .rightRow{
            width: 49%;
            display: inline-block;
            text-align: left;
        }

        .form{
            margin-top: 40px;
        }

        input{
            display: block;
            width: 100%;
            padding: 5px;
            height: 38px;
            font-size: 16px;
            line-height: 1.5;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-bottom: 2px;

        }

        form button{
            background-color: #72c358;
            border: 1px solid #72c358;
            color: #ffffff;
            border-radius: 5px;
            padding: 10px;
        }

        .middle{
            width: 80%;
            margin: auto;
        }
    </style>
</head>

<body>

<div class="middleBox">
    <div class="middle">
        <?php

            foreach ($data as $index=>$value){
                echo "<div class='row'> <div class='leftRow' >". strtoupper($index)  ."</div>  <div class='rightRow' >". strtolower($value) ."</div> </div>";
            }

        ?>

        <div class="form">
            <p>This form post to users endpoint. It will create a text file called input.txt</p>
            <form action="/users" method="post">
                <input type="text" name="name" placeholder="Name" />
                <input type="text" name="email" placeholder="Email" />
                <button type="submit">Submit</button>
            </form>
        </div>

    </div>
</div>
</body>
</html>