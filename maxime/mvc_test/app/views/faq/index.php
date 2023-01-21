<!DOCTYPE html>
<html>
<?php $image_folder = "/images/" ?>
<?php $css = "/css/" ?>
<?php $js = "/js/" ?>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="with=device-wdith, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
    <link rel="stylesheet" href="<?= $css ?>faq3.css">


    <title>FAQ</title>
</head>



<body>


    <div class="faq">
        <?php
        foreach ($data["questions"] as $item) { ?>
            <div class="question">
                <div class="question-title"><?php echo $item[0]; ?></div>
                <div class="answer"><?php echo $item[1]; ?></div>
            </div>
        <?php } ?>
    </div>

</body>

</html>

<script>
    window.onload = function() {
        window.addEventListener('scroll', function(e) {
            if (window.pageYOffset > 100) {
                document.querySelector("header").classList.add('is-scrolling');
            } else {
                document.querySelector("header").classList.remove('is-scrolling');
            }
        });

        const menu_btn = document.querySelector('.toggle');
        const mobile_menu = document.querySelector('.mobile-nav');

        menu_btn.addEventListener('click', function() {
            menu_btn.classList.toggle('is-active');
            mobile_menu.classList.toggle('is-active');
        });
    }

    const questions = document.querySelectorAll('.question');
    questions.forEach(question => {
        const title = question.querySelector('.question-title');
        const answer = question.querySelector('.answer');
        title.addEventListener('click', () => {
            title.classList.toggle('active');
            if (title.classList.contains('active')) {
                answer.style.maxHeight = answer.scrollHeight + 'px';
            } else {
                answer.style.maxHeight = 0;
            }
        });
    });
</script>