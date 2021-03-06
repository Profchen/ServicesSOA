<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Page User</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/css/1-col-portfolio.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/library/bootstrap.min.js"></script>



    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="./datatables/dataTables.css">
    <script type="text/javascript" charset="utf8" src="./datatables/dataTables.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        $(document).ready(function(){
            $('#table_rang').DataTable({
                searching: false
            });
        });

        function changePage(idPage) {
            switch(idPage) {
                case 'match':
                    $('#match').show();
                    $('#bet').hide();
                    $('#rang').hide();
                    break;
                case 'bet':
                    $('#match').hide();
                    $('#bet').show();
                    $('#rang').hide();
                    break;
                case 'rang':
                    $('#match').hide();
                    $('#bet').hide();
                    $('#rang').show();
                    break;
                default:
                    break;
            }
        }
    </script>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" onclick="changePage('match')">Les matchs � venir</a>
                </li>
                <li>
                    <a href="#"  onclick="changePage('bet')">Mes paris</a>
                </li>
                <li>
                    <a href="#"  onclick="changePage('rang')">Mon classement</a>
                </li>
                <li>
                    <a href="./PageAdmin.php">Administration</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div id="match">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Les matchs � venir
                    <small>Tentez votre chance!</small>
                </h1>
            </div>
        </div>


        <div id="matchs">



        </div>



        <div id="paris">



        </div>

    </div>


    <div id="bet" style="display: none;">
        <!-- page list des paris -->

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mes paris
                    <small>paris effectu�s</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- rappel du match pari�-->
        <div class="row">
            <div class="col-lg-12">
                <h2>France - Allemagne</h2>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-md-6">
                <h3>Pari effectu�</h3>
                <h4 style="bold">Vainqueur : France</h4>
                <p style="bold">Score : 2 - 0</p>
                <p>Points obtenus : X points</p>
            </div>
            <div class="col-md-6">
                <h3>R�sultats</h3>
                <h4 style="bold">Vainqueur : France</h4>
                <p style="bold">Score : 4 - 1</p>
            </div>
        </div></br>

        <!-- rappel du match pari�-->
        <div class="row">
            <div class="col-lg-12">
                <h2>France - Espagne</h2>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-md-6">
                <h3>Pari effectu�</h3>
                <h4 style="bold">Vainqueur : France</h4>
                <p style="bold">Score : 3 - 1</p>
                <p>Points obtenus : -</p>
            </div>
            <div class="col-md-6">
                <h3>R�sultats</h3>
                <h4 style="bold">Ces informations seront saisies une fois le match effectu�</h4>
            </div>
        </div></br>
    </div>

    <div id="rang" style="display: none;">
        <!-- Page classement -->

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mon classement
                    <small>classement en fonction des points obtenus</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- tableau de classement -->

        <div class="container">
            <table class="table table-bordered" id="table_rang">
                <thead>
                <tr>
                    <th>Position</th>
                    <th>Pseudo</th>
                    <th>Total de points</th>
                    <th>Match France - Allemagne</th>
                    <th>Match Espagne - Portugal</th>
                    <th>Match France - Espagne</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Lolilulz</td>
                    <td>8</td>
                    <td>3</td>
                    <td>1</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Profchen</td>
                    <td>6</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                </tr>
                <tr style="background-color:#51D0EA">
                    <td>2</td>
                    <td>Benji</td>
                    <td>6</td>
                    <td>4</td>
                    <td>2</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Adrien</td>
                    <td>3</td>
                    <td>3</td>
                    <td style="text-align:center;">/</td>
                    <td>0</td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- table -->

        <hr>
        <!-- /.row -->
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <button id="yolo">Matchs</button>
                <button id="mesParis">Paris</button>
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

</body>

</html>


<script type="text/javascript" src="js/library/jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript">

    $('#yolo').on('click', YOLO);


    function YOLO() {

        var URL = 'http://localhost/ServicesSOA/php/ControllerWS.php?ws=match&action=match';
        $.ajax({// ajax
            url: URL, // url de la page à charger
            type: 'POST',
            success: function (data) {// si la requete est un succes

                var obj = jQuery.parseJSON(data);
                for (var i = 0; i < obj.length; i++) {


                    $('#match').append(obj[i]['nameTeam1'] + '-' + obj[i]['nameTeam2'] + '\r');

                }


            },
            error: function (XMLHttpRequest, textStatus, errorThrows) { // erreur durant la requete
            }
        });
        return false; // on desactive le lien
    }

    $('#mesParis').on('click', Paris);

    function Paris(){
        var URL = 'http://localhost/ServicesSOA/php/ControllerWS.php?ws=bet&action=bet';
        $.ajax({// ajax
            url: URL, // url de la page à charger
            type: 'POST',
            success: function (data) {// si la requete est un succes

                var obj = jQuery.parseJSON(data);
                for (var i = 0; i < obj.length; i++) {
                    $('#paris').append(obj[i]['nameTeam1'] + ' ' + obj[i]['be_score1'] +  '-' + obj[i]['be_score2'] + ' ' + obj[i]['nameTeam2'] + '\r');

                }


            },
            error: function (XMLHttpRequest, textStatus, errorThrows) { // erreur durant la requete
            }
        });
        return false; // on desactive le lien
    }



</script>







