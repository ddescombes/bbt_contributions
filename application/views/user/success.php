<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BBT Add User Success</title>
        <meta name="description" content="Offering Envelope tracking.">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/superhero/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </head>
    <body style="background-color:#355980">
        <div class="container" style="max-width: 1400px">
            <div class="bs-component">
              <?php 
                    $this->load->view('navigation');
                ?>
            </div>
            <div class="jumbotron" style="background-color: #2b3e50">
                <div class="page-header" id="banner">
                    <div class="bs-docs-sections">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="bs-component">
                                    <div class="alert alert-dismissible alert-success">
                                        <h4 class="alert-heading">Success!</h4>
                                        <p class="mb-0">User was submitted successfully.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                    <div class="form-group col-md-12" style="text-align: right">
                        <a href="<?php echo base_url('user/add_user');?>"><button class="btn btn-primary">Add Another User</button></a>
                    </div>
                </div>
                    </div>
                </div>
            </div>
    </body>
</html>