    <?php
        include('header.php');
    ?>

            <main>
                <div class="container text-center text-white pt-5">
                    <h3 class="text-white my-4 font-weight-bold">Account Sign In</h3>
                    <div class="row">
                        <div class="col-md"></div>

                        <!--------------------------------------------Login form starts ------------------------------------------------>

                        <form class="col-md-4 p-4" action="includes/process.inc.php" method="post">
                            <div class="form-group">
                                <input class="form-control p-4" type="text" name="username" placeholder="Username or email" value="<?php if (isset($_COOKIE['user'])) {
                                    echo $_COOKIE['user'];
                                }
                                ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control p-4" type="password" name="pwd" placeholder="Password" value="<?php
                                if (isset($_COOKIE['pass'])) {
                                    echo $_COOKIE['pass'];
                                }?>">
                            </div>
                            <div class="form-group">
                                <input id="rem" class="form-control-check" type="checkbox" name="remember-me" value="remember">
                                <label for="rem">Remember me</label>
                            </div>
                            <div class="form-group">
                                <p><?php if (isset($_SESSION['msg'])) {
                                        echo($_SESSION['msg']);
                                        unset($_SESSION['msg']);
                                    } ?></p>
                            </div>
                            <button type="submit" name="login-submit" class="btn btn-dark btn-lg btn-block">Login</button>
                        </form>

                        <!--------------------------------------------- Login ends --------------------------------------------------------->

                        <div class="col-md"></div>
                    </div>
                </div>

                <?php include("footer.php"); ?>