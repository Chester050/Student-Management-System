<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student Management System </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <style>
            .function-btn{
                background-color: cornflowerblue;
                width:500px;
                height:150px;
                border-radius:15px 50px;
                margin:20px auto 10px auto;
                transition:.3s;
                cursor:pointer;
                display:block;
                color:white;
                text-align:center;
                padding:10px;


            }


            .function-btn  a{
                text-decoration:none;
                color:white;
            }



            .function-btn:hover{
                transform:translateX(50px)

            }

            .function-btn:hover{
                color:black;

            }

            .function-link{
                text-decoration: none;
            }
        </style>
    </head>


    <body class="antialiased">


        <div class="container-fluid p-5 bg-primary text-white text-center">
               <h1 > <i class="fa-solid fa-book-open"></i> Student Management System</h1>
          </div>

        @yield('content')






    </body>
    </html>
