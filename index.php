<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Authentification</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vues/bootstrap/css/bootstrap.css" rel="stylesheet">
</head>

<script src="vues/bootstrap/js/bootstrap.js"></script>
<script src="vues/bootstrap/js/bootstrap.min.js"></script>
<script src="vues/bootstrap/js/jquery.js"></script>
<script>
    function changeForm(idForm) {
        if (idForm == "cnx") {
            $('#register').hide();
            $('#cnx').show();
        } else {
            $('#register').show();
            $('#cnx').hide();
        }
    }
</script>
<style>
    .title {
        text-align: center; font-size: 30px; color:grey;
        cursor : pointer;
    }
</style>
<body>
<div class="title" onclick="changeForm('cnx')">Déjà inscrit?</div>
<form class="form-horizontal" id="cnx">
    <fieldset>

        <!-- Form Name -->
        <legend style="text-align:center; font-size:24px; color:blue;">Connexion</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Email</label>
            <div class="col-md-4">
                <input id="email" name="textinput" type="text" placeholder="Entrez votre email" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">Mot de passe</label>
            <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="Veuillez saisir votre mot de passe" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="connexion" name="singlebutton" class="btn btn-primary">Connexion</button>
            </div>
        </div>

    </fieldset>
</form></br></br>


<div class="title" onclick="changeForm('register')">Pas encore inscrit? Créez un compte pour vous connecter</div></br>
<form class="form-horizontal" style="display: none;" id="register">
    <fieldset>

        <!-- Form Name -->
        <legend style="text-align:center; font-size:24px; color:blue;">Inscription</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nom">Nom</label>
            <div class="col-md-4">
                <input id="nom" name="nom" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="prenom">Prénom</label>
            <div class="col-md-4">
                <input id="prenom" name="prenom" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Pseudo</label>
            <div class="col-md-4">
                <input id="pseudo" name="textinput" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">Mot de passe</label>
            <div class="col-md-4">
                <input id="pwd" name="password" type="password" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="confirmpassword">Confirmation de mot de passe</label>
            <div class="col-md-4">
                <input id="pwd2" name="confirmpassword" type="password" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="datenaissance">Date de naissance</label>
            <div class="col-md-4">
                <input id="ddn" name="datenaissance" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="mail">Mail</label>
            <div class="col-md-4">
                <input id="mail" name="mail" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="inscription" name="singlebutton" class="btn btn-primary">Inscription</button>
            </div>
        </div>

    </fieldset>
</form>

</body>
</html>

<script type="text/javascript" src="js/library/jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript">
    $('#connexion').on('click', Login);
    $('#inscription').on('click', Inscription);


    function Login() {
        var URL = "php/ControllerWS.php"; // on recuperer l' adresse du lien
        $.ajax({// ajax
            url: URL, // url de la page Ã  charger
            cache: false, // pas de mise en cache
            data : "ws=" + "user" +  "&action="+ "login" + "&email=" + document.getElementById("email").value + "&password=" + document.getElementById("password").value,
            dataType: 'text',
            type: 'GET',
            success: function (data) {// si la requete est un succes
                if(data == "false"){
                    alert("le mot de passe ou l'identifiant n'est pas correct");
                }else{
                    window.location = "vues/PageUser.php";
                }

            },
            error: function (XMLHttpRequest, textStatus, errorThrows) { // erreur durant la requete
            }
        });
        return false; // on desactive le lien
    }

    function Inscription(){

        if (document.getElementById("pwd").value  == document.getElementById("pwd2").value ){
            var URL = "php/ControllerWS.php"; // on recuperer l' adresse du lien
            $.ajax({// ajax
                url: URL, // url de la page Ã  charger
                cache: false, // pas de mise en cache
                data : "ws=" + "user" +  "&action="+ "register" + "&email=" + document.getElementById("mail").value + "&pwd=" + document.getElementById("pwd").value +
                "&prenom=" + document.getElementById("prenom").value + "&nom=" + document.getElementById("nom").value + "&pseudo=" + document.getElementById("pseudo").value +
                "&ddn=" + document.getElementById("ddn").value,
                dataType: 'text',
                type: 'GET',
                success: function (data) {// si la requete est un succes
                    alert(data);
                    if(data == "true"){
                        window.location = "index.php";
                    }else{
                        alert('ko');
                    }

                },
                error: function (XMLHttpRequest, textStatus, errorThrows) { // erreur durant la requete
                }
            });
        } else {
            alert('Les mots de passes ne correspondent pas');
        }


        return false; // on desactive le lien
    }

 </script>
