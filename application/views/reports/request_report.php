<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BBT Request Annual Report</title>
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
                        <p>Request an Annual Report</p>
                    </div>
                </div>
            <?php 
                echo "<ul>";
                echo validation_errors('<li style="color: red;"><span class="label label-danger">', '</span></li>');
                echo "</ul>";
                $attributes = array('class' => 'needs-validation', 'id' => 'input_form', 'target'=>'blank');
                echo form_open(base_url('report/index'), $attributes); ?>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="year" class="alert-link" >Year</label>
                        <input type="number" class="form-control" id="year" name="year" required value="<?php echo set_value('year'); ?>" >
                        <div class="invalid-feedback">
                            <b>Please enter a year.</b>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="env_no" class="alert-link" >Envelope Number</label>
                        <select id="env_no" class="form-control" name="env_no" required required value="<?php echo set_value('env_no'); ?>">
                            <option value="">Choose...</option>
                            <?php foreach ($env_names as $name):
                                echo '<option value="'.$name['env_no'].'">'.$name['env_no'].' - '.$name['name'].'</option>';
                             endforeach;?>
                        </select>
                        <div class="invalid-feedback">
                            <b>Please enter an envelope number.</b>
                        </div>
                    </div>
                </div>
                    <div class="form-group col-md-6" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Get Annual Report</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </body>
</html>