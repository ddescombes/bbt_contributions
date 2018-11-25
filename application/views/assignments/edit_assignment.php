<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BBT Edit Contribution</title>
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
                            <p class="lead">Edit Assignments</p>
                            <?php 
                                $this->load->helper('form');
                                $attributes = "";
                                echo form_open(base_url('assignment/update'), $attributes); 
                            ?>
                            <?php 
                                foreach ($assignments as $assignment_item):

                                    echo "<div class='bs-docs-section'>";
                                    echo "<div class='row'>";
                                    echo "<div class='col-lg-4'>";
                                            echo "<p>".form_label('Env No:');?>
                                            <input type="text" style="color:white;" readonly class="form-control" id="env_no" name="env_no" value="<?php echo $assignment_item['env_no']?>"/></p>
                                            <?php
                                            echo "<p>".form_label('Address:');
                                            echo form_input(array('id'=>'address', 'name'=>'address', 'class'=>'form-control', 'value'=>$assignment_item['address']))."</p>";
                                            echo "<p>".form_label('Zip:');
                                            echo form_input(array('id'=>'zip', 'name'=>'zip', 'class'=>'form-control', 'value'=>$assignment_item['zip']))."</p>";
                                            
                                        echo "</div>";
                                        echo "<div class='col-lg-4'>";
                                            echo "<div class='text-danger'>".form_error('assigned')."</div>";
                                            echo "<p>".form_label('Assigned:');
                                            echo form_input(array('type'=>'date','id'=>'assigned', 'name'=>'assigned', 'class'=>'form-control', 'value'=>$assignment_item['assigned']))."</p>";
                                            echo "<p>".form_label('City:');
                                            echo form_input(array('id'=>'city', 'name'=>'city', 'class'=>'form-control', 'value'=>$assignment_item['city']))."</p>";
                                            echo "<div class='text-danger'>".form_error('env')."</div>";
                                            echo "<p>".form_label('Has Envelopes:');
                                            echo form_input(array('id'=>'env', 'name'=>'env', 'class'=>'form-control', 'value'=>$assignment_item['env']))."</p>";
                                    
                                        echo "</div>";
                                        echo "<div class='col-lg-4'>";
                                            echo "<div class='text-danger'>".form_error('name')."</div>";
                                            echo "<p>".form_label('Name:');
                                            echo form_input(array('id'=>'name', 'name'=>'name', 'class'=>'form-control', 'value'=>$assignment_item['name']))."</p>";
                                            echo "<p>".form_label('State:');
                                            echo form_input(array('id'=>'state', 'name'=>'state', 'class'=>'form-control', 'value'=>$assignment_item['state']))."</p>";
                                            echo "<p>".form_label('Released:');
                                            echo form_input(array('type'=>'date','id'=>'released', 'name'=>'released', 'class'=>'form-control', 'value'=>$assignment_item['released']))."</p>";
                                            
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            ?>
                            <?php endforeach; ?>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="text-align: right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>