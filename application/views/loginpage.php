<?php include 'header.php'; ?>

<style type="text/css">
	body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>

    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <center>
        <span style="color: #fff"><?php echo $this->session->flashdata('msg') ?></span>
        </center>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center" >
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo base_url('data/login') ?>" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                               <!--  <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <br><br>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info" data-toggle='modal' data-target='#register_here'>Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Modal -->
<div id="register_here" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register Here </h4>
      </div>
       <div class="modal-body">
        <form method="post" action="<?php echo base_url('data/register') ?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username : </label>
            <input type="text" name="Username" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email : </label>
            <input type="email" class="form-control" name="email"/>

          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password : </label>
            <input type="password" class="form-control" name="password"/>
          </div>
          <div >
            <input type="submit" value="Submit" class="btn btn-success">
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<?php include 'footer.php'; ?>
