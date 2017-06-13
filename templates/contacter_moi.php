
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Formulaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="form.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    </head>
    <p align="center"><strong>Contact</strong></p>
    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <form action="../controllers/contact.php" method="post" enctype="application/x-www-form-urlencoded" name="formulaire">
            <tr> 
                <td colspan="3"><strong>Envoyer un message</strong></td>
            </tr>
            <tr> 
                <td><div align="left">Votre nom :</div></td>
                <td colspan="2"><input type="text" name="nom" size="45" maxlength="100"></td>
            </tr>
            <tr> 
                <td width="17%"><div align="left">Votre mail :</div></td>
                <td colspan="2"><input type="text" name="mail" size="45" maxlength="100"></td>
            </tr>
            <tr> 
                <td><div align="left">Sujet : </div></td>
                <td colspan="2"><input type="text" name="objet" size="45" maxlength="120"></td>
            </tr>
            <tr> 
                <td><div align="left">Message : </div></td>
                <td colspan="2"><textarea name="message" cols="50" rows="10"></textarea></td>
            </tr>
            <tr> 
                <td></td>
                <td width="42%"><center>
                <input type="reset" name="Submit" value="Réinitialiser le formulaire">
            </center></td>
            <td width="41%"><center>
                <input type="submit" name="Submit" value="Envoyer">
            </center></td>
            </tr>
        </form>
    </table>