<!DOCTYPE html>
<html>

<head>
    <style>
        .newsletter {
            display: flex;
            align-items: center;
        }

        .newsletter h2 {
            margin: 0;
        }

        .newsletter form {
            margin-left: auto;
        }
    </style>
</head>

<body>
    <div class="newsletter">
        <h2>Inscrivez-vous à notre newsletter</h2>
        <p>Si vous souhaitez bénéficier dès à présent des avancées technologiques de nos capteurs, vous pouvez vous inscrire à notre newsletter pour être informé de la date de sortie.</p>
        <form action="addnewsletter.php" method="post" class="form">
            <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email" required>
            <input type="submit" value="S'inscrire" class="newsbtn">
        </form>
    </div>

</body>


</html>