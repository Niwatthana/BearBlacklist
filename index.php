<!DOCTYPE html>
<html>

<head>
  <title>BearBlacklist</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="img/icon.png">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
    body,
    html {
      height: 95%;
      font-family: "Inconsolata", sans-serif;
    }

    .bgimg {
      background-position: center;
      background-size: cover;
      background-image: url("img/bgl.jpg");
      min-height: 100%;
    }

    .menu {
      display: none;
    }

    li {
      font-size: 22px;
    }
  </style>
</head>

<body>

  <!-- Links (sit on top) -->
  <header class="p-3 bg-white text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="img/icon.png" alt="teenbear" width="50">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-1 justify-content-center mb-md-0">
          <li><a href="https://www.youtube.com/watch?v=o_YniMXacco" class="nav-link px-4 text-dark">4 วิธีตรวจสอบเบื้องต้น</a></li>
          <li><a href="https://www.chaladohn.com/" class="nav-link px-4 text-dark">ฉลาดโอน</a></li>
          <li><a href="https://24hicarecenter.com/cybervaccinated" class="nav-link px-4 text-dark">ข้อมูลต่างๆ</a></li>
          <li><a href="about.php" class="nav-link px-4 text-dark">เกี่ยวกับเรา</a></li>
        </ul>

        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form> -->

        <!-- <div class="d-grid gap-2 col-1 mx-auto">
          <button type="button" class="btn btn-light btn-lg">Login</button>
        </div> -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

          <a href="login.php" type="button" class="btn btn-dark btn-lg">Login</a>

        </div>
      </div>
    </div>
  </header>

  <!-- รูปเรา -->
  <header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-middle w3-center">
      <h1 class="txt-type" data-wait="3000" style="text-align: center; color: #fffdd0; text-shadow: 3px 3px #4d151574;
            font-size: 70px;" data-words='["ยินดีต้อนรับสู่BearBlacklist","ยินดีต้อนรับสู่BearBlacklist", "ยินดีต้อนรับสู่BearBlacklist"]'>

      </h1>

      <!-- <span class="w3-text-white" style="font-size:90px">the<br>Cafe</span   > -->
    </div>


  </header>


  <!-- Add a background color and large text to the whole page -->
  <div class="w3-sand w3-grayscale w3-large">

    <!-- นาฬกา -->
    <!-- <div class="w3-container" id="where" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">WHERE TO FIND US</span></h5>
    <p>Find us at some address at some place.</p>
    <img src="/w3images/map.jpg" class="w3-image" style="width:100%">
    <p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste.</p>
    <p><strong>Reserve</strong> a table, ask for today's special or just send us a message:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required name="People"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2020-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-black" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
</div> -->

    <!-- End page content -->
  </div>




  <script src="js/jslogin.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>