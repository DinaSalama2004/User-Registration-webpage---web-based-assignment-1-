<?php
include 'DB_Ops.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Registration</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body class="bg-light">
    <?php include './header.php'; ?>

    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class=" border-light shadow shadow-md rounded-3">
                <div class="row g-0">
                    <div class="col-12 col-md-5">
                        <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                            src="./big-cartoon-sketch-hand-drawn-penguin-frame-with-lettering-hello-vector-illustration_623474-836.jpg"
                            alt="register Logo">
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
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-md-11">
                                    <form id="registrationForm" class="ps-3 p-4 bg-white" action="DB_Ops.php"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="fullName" id="fullName"
                                                placeholder="fullName" required>
                                            <label for="fullName">Full Name</label>
                                            <div id="fullNameAlert" class="alert alert-danger d-none mt-2 p-2"></div>

                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="userName" id="userName"
                                                placeholder="username" required>
                                            <label for="username">Username</label>
                                            <div id="usernameAlert" class="alert alert-danger d-none mt-2 p-2"></div>
                                            <div id="usernameAlertS" class="alert alert-success d-none mt-2 p-2"></div>

                                        </div>
                                        <span id="username_status"></span> <!-- Message area -->
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" name="phone" id="phone"
                                                placeholder="Phone" required>
                                            <label for="phone">Phone</label>
                                            <div id="phoneAlert" class="alert alert-danger d-none mt-2 p-2"></div>
                                        </div>

                                        <div class="d-flex">
                                            <select name="countryPrefix"
                                                class="form-select w-auto rounded-end-0 phone-prefix"
                                                id="countryPrefix">
                                                <option value="20" selected>+20</option>
                                                <option value="966">+966</option>
                                                <option value="1">+1</option>
                                                <option value="44">+44</option>
                                                <option value="49">+49</option>
                                                <option value="33">+33</option>
                                                <option value="34">+34</option>
                                                <option value="39">+39</option>
                                                <option value="91">+91</option>
                                                <option value="81">+81</option>
                                                <option value="86">+86</option>
                                                <option value="7">+7</option>
                                                <option value="82">+82</option>
                                                <option value="62">+62</option>
                                                <option value="55">+55</option>
                                                <option value="52">+52</option>
                                                <option value="234">+234</option>
                                                <option value="27">+27</option>
                                                <option value="971">+971</option>
                                                <option value="90">+90</option>
                                            </select>
                                            <div class="form-floating mb-3 d-flex">
                                                <input type="tel" class="form-control rounded-end-0 rounded-start-0"
                                                    name="whatsapp" id="whatsappNumber" placeholder="whatsappNumber"
                                                    required>
                                                <label for="whatsappNumber">WhatsApp</label>
                                                <button type="button"
                                                    class="btn btn-outline-dark rounded-start-0 p-0 px-1"
                                                    id="checkWhatsappNumberBtn">Check</button>
                                            </div>
                                        </div>
                                        <p id="whatsappMsg" class="text-success"></p>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="address" id="address"
                                                placeholder="address" required>
                                            <label for="address">Address</label>
                                            <div id="addressAlert" class="alert alert-danger d-none mt-2 p-2"></div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="email" required>
                                            <label for="email">Email</label>
                                            <div id="emailAlert" class="alert alert-danger d-none mt-2 p-2"></div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="password" required>
                                            <label for="password">Password</label>
                                        </div>
                                        <div id="passwordAlert" class="alert alert-danger d-none mt-2"></div>

                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="confirmPassword"
                                                id="confirmPassword" placeholder="Confirm Password" required>
                                            <label for="confirmPassword">Confirm Password</label>
                                            <div id="confirmPasswordAlert" class="alert alert-danger d-none mt-2"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" name="fileToUpload" id="fileInput"
                                                required>
                                        </div>
                                        <div id="confirmPasswordAlert" class="alert alert-danger d-none mt-2"></div>
                                        <button type="submit" class="btn btn-primary w-100 py-2"
                                            name="submit">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './footer.php'; ?>

    <style>
        @media screen and (min-width: 700px) {
            .container {
                width: 80% !important;
            }
        }
    </style>
    <script src="validations.js"></script>
    <script src="viewPassword.js"></script>
</body>

</html>