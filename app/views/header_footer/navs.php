<!DOCTYPE html>
<html>
<?php
$root = "/";
?>

<head>
  <title>Captair Administration</title>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <?php if ($data == "capteur" || $data == "capteurs") {
              ?> <a class="nav-link active" aria-current="page" href="<?= $root ?>admin/capteurs">Capteur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $root ?>admin/users">Utilisateurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $root ?>admin/faq">F.A.Q.</a>
            <?php
              } else if ($data == "faq") {

            ?>
              <a class="nav-link" href="<?= $root ?>admin/capteurs">Capteur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?= $root ?>admin/users">Utilisateurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?= $root ?>admin/faq">F.A.Q.</a>
            <?php
              } else {
            ?>
              <a class="nav-link" href="<?= $root ?>admin/capteurs">Capteur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= $root ?>admin/users">Utilisateurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $root ?>admin/faq">F.A.Q.</a>
            <?php
              }
            ?>
            </li>
            <div class="box" style="display:flex; flex-direction:column; justify-content: right;">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= $root ?>auth/logout/">Logout</a>
            </div>
            </li>
          </ul>
        </div>
      </div>
  </nav>
  </div>
</body>

</html>