<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Food Order System</title>
  <style>
    .food-card {
      margin-bottom: 24px;
    }

    body {
      margin: 0 0 55px 0;
    }

    .nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      height: 55px;
      box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
      background-color: #ffffff;
      display: flex;
      overflow-x: auto;
    }

    .nav__link {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      flex-grow: 1;
      min-width: 50px;
      overflow: hidden;
      white-space: nowrap;
      font-family: sans-serif;
      font-size: 13px;
      color: #444444;
      text-decoration: none;
      -webkit-tap-highlight-color: transparent;
      transition: background-color 0.1s ease-in-out;
    }

    .nav__link:hover {
      background-color: #eeeeee;
    }

    .nav__link--active {
      color: black;
    }

    .nav__icon {
      font-size: 18px;
    }
  </style>
</head>

<body>

  <div class="container-fluid">
    <!-- navbar  -->
    <nav class="nav bg-warning">
      <a href="#" class="nav__link">
        <i class="material-icons nav__icon">home</i>
        <span class="nav__text">Home</span>
      </a>
      <a href="#" class="nav__link nav__link--active">
        <i class="material-icons nav__icon">shopping_bag</i>
        <span class="nav__text">Orders</span>
      </a>
      <a href="#" class="nav__link">
        <i class="material-icons nav__icon">shopping_cart</i>
        <span class="nav__text">Cart</span>
      </a>
      <a href="#" class="nav__link">
        <i class="material-icons nav__icon">person</i>
        <span class="nav__text">Profile</span>
      </a>

    </nav>
  </div>


  <!-- search bar  -->
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" aria-label="Search">
          <button class="btn btn-warning" type="button">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- card section  -->
  <div class="container">

    <h4 class="my-4">Change Heading</h4>



    <div class="row">
      <div class="col-6">
        <div class="card food-card">
          <img src="food1.jpg" class="card-img-top" alt="Food 1">
          <div class="card-body">
            <h5 class="card-title">Food 1</h5>
            <p class="card-text">Description of Food 1.</p>
            <div class="d-flex align-items-center justify-content-between">

              <button class="btn btn-warning">Add to Cart</button>
              <p>Rs. 500</p>
            </div>

          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card food-card">
          <img src="food2.jpg" class="card-img-top" alt="Food 2">
          <div class="card-body">
            <h5 class="card-title">Food 2</h5>
            <p class="card-text">Description of Food 2.</p>
            <button class="btn btn-warning">Buy Now</button>

          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card food-card">
          <img src="food2.jpg" class="card-img-top" alt="Food 2">
          <div class="card-body">
            <h5 class="card-title">Food 2</h5>
            <p class="card-text">Description of Food 2.</p>
            <button class="btn btn-warning">Buy Now</button>

          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card food-card">
          <img src="food2.jpg" class="card-img-top" alt="Food 2">
          <div class="card-body">
            <h5 class="card-title">Food 2</h5>
            <p class="card-text">Description of Food 2.</p>
            <button class="btn btn-warning">Buy Now</button>

          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card food-card">
          <img src="food2.jpg" class="card-img-top" alt="Food 2">
          <div class="card-body">
            <h5 class="card-title">Food 2</h5>
            <p class="card-text">Description of Food 2.</p>
            <button class="btn btn-warning">Buy Now</button>

          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card food-card">
          <img src="food2.jpg" class="card-img-top" alt="Food 2">
          <div class="card-body">
            <h5 class="card-title">Food 2</h5>
            <p class="card-text">Description of Food 2.</p>
            <button class="btn btn-warning">Buy Now</button>

          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card food-card">
          <img src="food2.jpg" class="card-img-top" alt="Food 2">
          <div class="card-body">
            <h5 class="card-title">Food 2</h5>
            <p class="card-text">Description of Food 2.</p>
            <button class="btn btn-warning">Buy Now</button>

          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card food-card">
          <img src="food2.jpg" class="card-img-top" alt="Food 2">
          <div class="card-body">
            <h5 class="card-title">Food 2</h5>
            <p class="card-text">Description of Food 2.</p>
            <button class="btn btn-warning">Buy Now</button>

          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card food-card">
          <img src="food2.jpg" class="card-img-top" alt="Food 2">
          <div class="card-body">
            <h5 class="card-title">Food 2</h5>
            <p class="card-text">Description of Food 2.</p>
            <button class="btn btn-warning">Buy Now</button>

          </div>
        </div>
      </div>










    </div>
  </div>



  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>