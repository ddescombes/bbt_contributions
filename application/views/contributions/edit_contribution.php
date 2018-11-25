<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BBT Edit Contribution</title>
        <meta name="description" content="Offering Envelope tracking.">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/superhero/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo $this->config->item('asset_base')?><?php echo $js?>/handle_remarks.js"></script>
        <script src="<?php echo $this->config->item('asset_base')?><?php echo $js?>/handle_taxable.js"></script>
        <script src="<?php echo $this->config->item('asset_base')?><?php echo $js?>/handle_tax_remarks.js"></script>
        <script src="<?php echo $this->config->item('asset_base')?><?php echo $js?>/calculate_total.js"></script>
        <script src="<?php echo $this->config->item('asset_base')?><?php echo $js?>/check_total.js"></script>
        <script language='javascript' type='text/javascript'>
            function check(input) 
            {
                if (input.value != CalculateTotal()) 
                {
                    input.setCustomValidity('Total must be greater than 0 and cannot exceed the sum of offerings.');
                } 
                else 
                {
                    // input is valid -- reset the error message
                    input.setCustomValidity('');
                }
            }
        </script>
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
                        <p class="lead">Edit Contribution</p>
                    </div>
                </div>
            <?php 
                $data;
                foreach($contributions as $contribution)
                {
                    $data = $contribution;
                }
                echo "<ul>";
                echo validation_errors('<li style="color: red;"><span class="label label-danger">', '</span></li>');
                echo "</ul>";
                $attributes = array('class' => 'needs-validation', 'id' => 'input_form');
                echo form_open(base_url('contribution/update_contribution'), $attributes); ?>
                <div class="form-row">
                    <?php
                        list($special_remarks, $other_remarks) = explode(";", $data['remarks']);
                    ?>
                    <input type="hidden" id="EnvSysID" name="EnvSysID" value="<?php echo $data['EnvSysID']?>"/>
                    <div class="form-group col-md-3">
                        <label for="date" class="alert-link" >Date</label>
                        <input type="date" class="form-control" id="date" name="date" required value="<?php echo $data['giftdate']?>" >
                        <div class="invalid-feedback">
                            <b>Please enter a valid date.</b>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="env_no" class="alert-link" >Envelope Number</label>
                        <select id="env_no" class="form-control" name="env_no" required value="<?php echo $data['env_no']?>">
                            <option value="">Choose...</option>
                            <?php foreach ($env_names as $name):
                                if ($name['env_no'] == $data['Env_No'])
                                {
                                    echo '<option value="'.$name['env_no'].'" selected>'.$name['env_no'].' - '.$name['name'].'</option>';
                                }
                                else 
                                {
                                    echo '<option value="'.$name['env_no'].'">'.$name['env_no'].' - '.$name['name'].'</option>';
                                } 
                            endforeach;?>
                        </select>
                        <div class="invalid-feedback">
                            <b>Please enter an Envelope Number.</b>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="check_no" class="alert-link" >Check Number</label>
                        <input type="text" class="form-control" id="check_no" name="check_no" required value="<?php echo $data['check_no']; ?>" required>
                        <div class="invalid-feedback">
                            <b>Please enter a Check Number or "Cash".</b>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="general" class="alert-link" >General</label>
                        <input type="number" class="form-control" id="general" name="general" required value="<?php echo $data['regular']?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="missions" class="alert-link" >Missions</label>
                        <input type="number" class="form-control" id="missions" required value="<?php echo $data['missions'] ?>" name="missions">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="special" class="alert-link" >Special</label>
                        <input type="number" class="form-control" id="special" name="special" required value="<?php echo $data['special']?>" onInput="HandleTaxAndRemarks()">
                        <div class="form-check">
                            <?php
                                $attributes = 'class="form-check-input" name="tax_special" type="checkbox" id="tax_special"';
                                
                                if($data['special_taxed']=="1")
                                {
                                    $attributes .' checked="checked"';
                                }
                                echo form_checkbox('tax_special', 'tax_special',$data['special_taxed'], $attributes);
                                if($data['other']=="0.00")
                                {
                                    echo '<script type="text/javascript">',
                                    'HandleTaxable("tax_special", true, false);',
                                    '</script>';
                                }
                            ?>
                            <label class="form-check-label" for="tax_special" >
                                <b>Taxable</b>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="other" class="alert-link">Other</label>
                        <input type="number" class="form-control" id="other" name="other" required value="<?php echo $data['other']; ?>" onInput="HandleTaxAndRemarks()">
                        <div class="form-check">
                            <?php
                                $attributes = 'class="form-check-input" name="tax_other" type="checkbox" id="tax_other"';
                                
                                if($data['other_taxed']=="1")
                                {
                                    $attributes .' checked="checked"';
                                }
                                echo form_checkbox('tax_other', 'tax_other',$data['other_taxed'], $attributes);
                                if($data['other']=="0.00")
                                {
                                    echo '<script type="text/javascript">',
                                    'HandleTaxable("tax_other", true, false);',
                                    '</script>';
                                }
                            ?>
                            <label class="form-check-label" for="tax_other" >
                                <b>Taxable</b>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="total" class="alert-link"  id="total_lbl">Total</label>
                        <?php
                            $attributes = 'class="form-control" name="total" id="total" required type="number" oninput="check(this)"';
                            echo form_input('total', set_value('total', $data['total'], false), $attributes);
                        ?>
                    </div>
                </div>
                <div class="form-row">
                   <br/>
                    <br/>
                    <div class="form-group col-md-6">
                        <label for="special_remarks" class="alert-link">Special Remarks</label>
                        <?php
                            $current_remarks = explode(';', $data['remarks']);
                            $js = 'id="special_remarks" name="special_remarks" class="form-control"';
                            if(!(float)$data['special']>0)
                            {
                                $js = $js.' disabled';
                            }
                            echo form_dropdown('special_remarks',$remarks_list,$current_remarks[0],$js);
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="other_remarks" class="alert-link" >Other Remarks</label>
                        <?php
                            $js = 'id="other_remarks" name="other_remarks" class="form-control"';
                            if(!(float)$data['other']>0)
                            {
                                $js = $js.' disabled';
                            }
                            echo form_dropdown('other_remarks',$remarks_list,$current_remarks[1],$js);
                        ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </body>
</html>