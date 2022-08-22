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
            #collapseAddInfo:hover{
                border-bottom:1px solid black;
            }

            .nav > li > a{
                color:white;
            }
            .table-report{
                margin:10px 0 50px 0;
            }

           .table-report th{
                text-align: center;
            }
            .table-report td{
                text-align: center;
            }


        </style>
    </head>


    <body class="antialiased">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">

        <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/studentRegister">Student Registration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/student_marking">Student Grade Marking</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/student_report">Student Report</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/student_database">Student Database</a>
              </li>
          </ul>

        </nav>

        @yield('content')







    </body>
    </html>
