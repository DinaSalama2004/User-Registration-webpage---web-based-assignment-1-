<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
<link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body class="bg-light">

<?php include './header.php'; ?>
  
<section class="p-3 p-md-4 p-xl-5">

    <div class="container" >
      <div class=" border-light shadow shadow-md rounded-3">
        <div class="row g-0  ">
          <div class="col-12 col-md-5">
            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="./big-cartoon-sketch-hand-drawn-penguin-frame-with-lettering-hello-vector-illustration_623474-836.jpg" alt="register  Logo">
          </div>
          <div class="col-12 col-md-7">
            <div class="p-3 p-md-4 p-xl-5">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <h2 class="h2 text-dark pb-2">Registration Form</h2>
                  </div>
                </div>
              </div>
              <form action="" >
                <div class="row gy-3 gy-md-4 overflow-hidden">

            
            
                        <div class="col-md-11">
                            <form id="registrationForm" class="ps-3 p-4  bg-white" >
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="fullName" id="fullName" placeholder="fullName" required>
                                    <label for="fullName">Full Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="userName" id="userName" placeholder="username" required>
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="form-floating mb-3 d-flex ">
                                    <input type="tel" class="form-control rounded-end-0" name="whatsapp" id="whatsappNumber" placeholder="whatsappNumber" required>
                                    <label for="whatsappNumber">WhatsApp</label>
                                    <button type="button" class="btn btn-outline-dark rounded-start-0 p-0 px-1"  >Check </button>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="address" id="address" placeholder="address" required>
                                    <label for="address">Address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
                                    <label for="confirmPassword">Confirm Password</label>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" name="userImage" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
                            </form>
                        </div>
                    

                </div>
          </form>
   
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <?php include './footer.php'; ?>


  <style>
    
    @media screen  and ( min-width: 700px ){
      .container{
  width: 80% !important;
      }
      
    }
  </style>






</body>