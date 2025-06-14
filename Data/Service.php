<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Service</title>
  <link rel="icon" href="/Final/Data/Images/Logo/Logo.png" type="Image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .service-box {
      border: 1px solid #ccc;
      padding: 30px;
      border-radius: 10px;
      margin-bottom: 30px;
      background-color: #fff0f5;
      height: 100%;
    }
    img {
      display: block;
      margin: 0 auto;
    }
  </style>
</head>
<body>

<!---APPONITMENT SECTION START--->
<div class="container mt-5">
  <h2 class="text-center" style="color:#FF69B4; font-family:Corbel;">Recommend Service</h2>
  <hr>

  <div class="row">
    <?php
    $services = [
      ['id' => 1, 'name' => 'Bleaching', 'image' => 'Bleaching.jpg', 'description' => 'Pre Bridal packages... body bleach...', 'price' => 600],
      ['id' => 2, 'name' => 'Threading', 'image' => 'Threading.jpg', 'description' => 'Eliminating excess hair on brows...', 'price' => 250],
      ['id' => 3, 'name' => 'Facial', 'image' => 'Facial.jpg', 'description' => 'Cleanse the skin and improve blood circulation...', 'price' => 800],
      ['id' => 4, 'name' => 'Hair Color', 'image' => 'spa.jpg', 'description' => 'Do it one month before your D-day...', 'price' => 1200],
      ['id' => 5, 'name' => 'Hair Spa', 'image' => 'Hair Spa.jpg', 'description' => 'Relaxing amid wedding stress...', 'price' => 1000],
      ['id' => 6, 'name' => 'Body Wax', 'image' => 'Body Wax.jpg', 'description' => 'Effective way to remove hair...', 'price' => 700],
      ['id' => 7, 'name' => 'Body Spa', 'image' => 'Body Spa.jpg', 'description' => 'De-stress and de-tan before wedding...', 'price' => 1300],
      ['id' => 8, 'name' => 'Manicure', 'image' => 'Manicure.jpg', 'description' => 'Removes dead cells and relaxes...', 'price' => 500],
    ];

    foreach ($services as $s):
    ?>
      <div class="col-md-6 col-lg-4">
        <div class="service-box shadow">
          <img src="/Final/Data/Images/Service/<?= $s['image'] ?>" height="100px">
          <center><font size="6" color="red"><?= $s['name'] ?></font></center>
          <br>
          <font size="4" color="#C21E56"><?= $s['description'] ?></font>
          <hr>
          <p><strong>Price: ₹<?= $s['price'] ?></strong></p>
          <div class="d-flex justify-content-between">
            <a href="http://localhost/Final/data/Appoiments.php" class="btn btn-success">Appoinment</a>
            <button class="btn btn-primary add-to-cart"
                    data-id="<?= $s['id'] ?>"
                    data-name="<?= $s['name'] ?>"
                    data-price="<?= $s['price'] ?>">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<!---APPONITMENT SECTION END--->

<br><br>
<center>
  <a href="http://localhost/Final/data/Logout.php">
    <button type="Back" class="btn btn-danger">Back To Home Page</button>
  </a>
</center>

<!-- Contact Us -->
<div class="footer mt-5">
  <table border="0" width="30%" align="center" cellpadding="15">
    <tr align="center">
      <td colspan="2">
        <font color="#581845" size="6">Contact Us :-</font><br><hr>
      </td>
    </tr>
    <tr>
      <td><font size="5" color="#0731A2">Name:</font></td>
      <td><input type="text" class="form-control"></td>
    </tr>
    <tr>
      <td><font size="5" color="#0731A2">Mobile:</font></td>
      <td><input type="number" class="form-control"></td>
    </tr>
    <tr>
      <td><font size="5" color="#0731A2">Message:</font></td>
      <td><textarea cols="20" rows="4" class="form-control"></textarea></td>
    </tr>
  </table>
  <center>
    <p>&copy; 2024 JT Parlour. All rights reserved.</p>
  </center>
</div>

<!-- Toast -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="toast" class="toast align-items-center text-white bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body">Added to cart!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<!-- JS Scripts -->
<script>
  let cart = [];

  document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', () => {
      const id = button.dataset.id;
      const name = button.dataset.name;
      const price = parseFloat(button.dataset.price);

      const exists = cart.find(item => item.id === id);
      if (!exists) {
        cart.push({ id, name, price });
        showToast(`${name} added to cart!`);
      } else {
        showToast(`${name} is already in cart.`);
      }

      console.log(cart); // Debug
    });
  });

  function showToast(message) {
    const toastEl = document.getElementById('toast');
    toastEl.querySelector('.toast-body').textContent = message;
    const toast = new bootstrap.Toast(toastEl);
    toast.show();
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
