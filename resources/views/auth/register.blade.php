<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/auth.css">
</head>

<body>

    @include('layout.auth-nav')
    <div class="my-5">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Daftar PMB Rosma</strong></h2>
                    <p style="font-family: sans-serif">Isi dengan lengkap semua field yang dibutuhkan</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <!-- Form -->
                            <form id="msform" class="login">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Account</strong></li>
                                    <li id="personal"><strong>Personal</strong></li>
                                    <li id="payment"><strong>Payment</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Account Information</h2>
                                        <input class="form-control" type="email" name="email"
                                            placeholder="Email Id" />
                                        <input type="text" name="uname" placeholder="UserName" />
                                        <input type="password" name="pwd" placeholder="Password" />
                                        <input type="password" name="cpwd" placeholder="Confirm Password" />
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Personal Information</h2>
                                        <input type="text" name="fname" placeholder="First Name" />
                                        <input type="text" name="lname" placeholder="Last Name" />
                                        <input type="text" name="phno" placeholder="Contact No." />
                                        <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Payment Information</h2>
                                        <div class="radio-group">
                                            <div class='radio' data-value="credit"><img
                                                    src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px">
                                            </div>
                                            <div class='radio' data-value="paypal"><img
                                                    src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px">
                                            </div>
                                            <br>
                                        </div>
                                        <label class="pay">Card Holder Name*</label>
                                        <input type="text" name="holdername" placeholder="" />
                                        <div class="row">
                                            <div class="col-9">
                                                <label class="pay">Card Number*</label>
                                                <input type="text" name="cardno" placeholder="" />
                                            </div>
                                            <div class="col-3">
                                                <label class="pay">CVC*</label>
                                                <input type="password" name="cvcpwd" placeholder="***" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="pay">Expiry Date*</label>
                                            </div>
                                            <div class="col-9">
                                                <select class="list-dt" id="month" name="expmonth">
                                                    <option selected>Month</option>
                                                    <option>January</option>
                                                    <option>February</option>
                                                    <option>March</option>
                                                    <option>April</option>
                                                    <option>May</option>
                                                    <option>June</option>
                                                    <option>July</option>
                                                    <option>August</option>
                                                    <option>September</option>
                                                    <option>October</option>
                                                    <option>November</option>
                                                    <option>December</option>
                                                </select>
                                                <select class="list-dt" id="year" name="expyear">
                                                    <option selected>Year</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="button" name="make_payment" class="next action-button"
                                        value="Confirm" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Success !</h2>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <img src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                    class="fit-image">
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>You Have Successfully Signed Up</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and Font Awesome JS (for icons) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script>
        // form register
        $(document).ready(function() {
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function() {
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li")
                    .eq($("fieldset").index(next_fs))
                    .addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            display: "none",
                            position: "relative",
                        });
                        next_fs.css({
                            opacity: opacity
                        });
                    },
                    duration: 600,
                });
            });

            $(".previous").click(function() {
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li")
                    .eq($("fieldset").index(current_fs))
                    .removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            display: "none",
                            position: "relative",
                        });
                        previous_fs.css({
                            opacity: opacity
                        });
                    },
                    duration: 600,
                });
            });

            $(".radio-group .radio").click(function() {
                $(this).parent().find(".radio").removeClass("selected");
                $(this).addClass("selected");
            });

            $(".submit").click(function() {
                return false;
            });
        });
    </script>
</body>

</html>
