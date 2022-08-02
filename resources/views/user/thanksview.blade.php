<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background-image: url("user/images/fresh-box.jpg");
            background-repeat:no-repeat;
            background-size: 100%;
        }
        button{
            background-image: linear-gradient(to bottom right, rgb(255, 7, 7), rgb(243, 85, 11),rgb(254, 242, 1),#fff);
            border: none;
            size: 100px;
            border-radius: 10px;
        }
        .btn{
            height:110px;
            width:400px;
            margin-left:auto;
            margin-right:auto;
            display:block;
            margin-top:22%;
            margin-bottom:0%;
            font-size: 30px;
            font-family: Arial, Helvetica, sans-serif;
            color: linear-gradient(to bottom right,#fff,rgb(254, 242, 1) , rgb(243, 85, 11),rgb(255, 7, 7));
        }
    </style>
</head>
<body>
    <form method="get" action="{{ route('home')}}">
    <button type="submit" class="btn btn-primary">Trở về trang chủ</button>
    </form>
</body>
</html>
