<!DOCTYPE html>
<html>z

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="with=device-wdith, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
  <link rel="stylesheet" href="faq3.css">
  <link rel="stylesheet" href="app_v2.js">
  <title>FAQ</title>
</head>



<body>

  <?php

  include("header.php");
  require "db_connect.php";

  $faq_list = [];

  $conn = OpenCon();
  $stmt = mysqli_prepare($conn, "SELECT * FROM faq");

  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $id, $title, $content);
  while (mysqli_stmt_fetch($stmt)) {
    $push_array = [
      'id' => $id,
      'title' => $title,
      'content' => $content
    ];
    array_push($faq_list,  $push_array);
  }

  mysqli_stmt_close($stmt);
  ?>
  <div class="faq">
    <?php foreach ($faq_list as $item) { ?>
      <div class="question">
        <div class="question-title"><?php echo $item['title']; ?></div>
        <div class="answer"><?php echo $item['content']; ?></div>
      </div>
    <?php } ?>
  </div>
  <div class="footer2">
    <?php include("footer.php") ?>
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