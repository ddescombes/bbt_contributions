<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BBT Add Contribution</title>
        <meta name="description" content="Offering Envelope tracking.">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/superhero/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </head>
    <body style="background-color:#355980">
        <div class="container">
            <div class="bs-component">
              <?php 
                    $this->load->view('navigation');
                ?>
            </div>
            <div class="jumbotron" style="background-color: #2b3e50">
            <div class="page-header" id="banner">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-sm-6" style="margin-bottom:25px">
                        <h1>BBT Contributions</h1>
                        <p class="lead">Add User</p>
                    </div>
                </div>
            <?php 
                echo "<ul>";
                echo validation_errors('<li style="color: red;"><span class="label label-danger">', '</span></li>');
                echo "</ul>";
                $attributes = array('class' => 'needs-validation', 'id' => 'input_form');
                echo form_open(base_url('user/add_user'), $attributes); ?>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="first_name" class="alert-link" >First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" >
                        <div class="invalid-feedback">
                            <b>Please enter a first name.</b>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="last_name" class="alert-link" >Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" >
                        <div class="invalid-feedback">
                            <b>Please enter a last name.</b>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="user_name" class="alert-link" >User Name</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo set_value('user_name'); ?>" >
                        <div class="invalid-feedback">
                            <b>Please enter a user name.</b>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="password" class="alert-link" >Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" >
                        <div class="invalid-feedback">
                            <b>Please enter a password.</b>
                        </div>
                    </div>
                </div>
                    <div class="form-group col-md-6" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </body>
</html>