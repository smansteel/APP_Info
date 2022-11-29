<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
<style>
    img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
    }

    table {
        font-family: 'Nunito Sans', sans-serif;
    }

    body {
        height: 100%;
        margin: 0;
        padding: 0;
        width: 100%;
        background-color: #00C4B3;
    }

    footer {
        flex-shrink: 0;
        width: 100%;
        background: #ebebeb;
        color: #000;

    }
</style>
<div class="box">
    <div class="flex-content">
        <?php include("header.php"); ?>
    </div>

    <body style="background-color:  #C2FFFA; margin: 0">

        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td bgcolor="#C2FFFA" align="center">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <td bgcolor="#C2FFFA" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 40px 40px 0px 0px; color: #111111; ">
                            <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Bienvenue !</h1> <img </td>
                    </tr>
                </table>
            </td>
            <tr>
            </tr>
            <tr>
                <td bgcolor="#d1d1d1" align="center" style="padding: 0px 10px 0px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #868686; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">Appuyez sur le bouton ci-dessous pour confirmer votre email :</p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="left">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td align="center" style="border-radius: 3px;" bgcolor="#00C4B3"><a href="https://captair.paris/confirmation.php?token=$token" target="_blank" style="font-size: 20px; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; display: inline-block;">Confirmer
                                                            le mail</a></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">Si cela ne fonctionne pas, copiez et collez le lien suivant dans votre
                                    navigateur :</p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;border-radius: 0px 0px 40px 40px;">
                                <p style="margin: 0;"><a target="_blank" href="vhttps://captair.paris/confirmation.php?token=$token" style="color: #00C4B3;">https://captair.paris/confirmation.php?token=$token</a></p>
                            </td>
                        </tr>
                    </table>
            <tr>
        </table>

    </body>


</div>
<div class="flex-content" id="footer">
    <?php include("footer.php"); ?>
</div>