<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BBT Edit Contribution</title>
        <meta name="description" content="Offering Envelope tracking.">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/superhero/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var oTable = $('#assignment_table').dataTable({"pageLength": 25});
                $('#error-alert').hide();
            });
        </script> 
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
                    <div class="row">
                        <div class="col-lg-8 col-md-7 col-sm-6" style="margin-bottom:25px">
                            <h1>BBT Contributions</h1>
                            <p class="lead">Assignment List</p>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover" id='assignment_table' style="width: 100%">
                            <thead>
                                <tr>
                                <th scope="col">Env</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">State</th>
                                <th scope="col">Zip</th>
                                <th scope="col">Has Env?</th>
                                <th scope="col">Date Assigned</th>
                                <th scope="col">Date Released</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($assignments as $assignment_item):
                                    echo 
                                        '<tr class="table-active"><td style="width: 30px;" id="Env_No:'.$assignment_item['env_no'].'">';
                                        echo $assignment_item['env_no']; 
                                        echo '</td><td tyle="width: 60px;" id="name:'.$assignment_item['env_no'].'">';
                                        echo $assignment_item['name'];
                                        echo '</td><td style="width: 90px;" id="address:'.$assignment_item['env_no'].'">';
                                        echo $assignment_item['address'];
                                        echo '</td><td style="width: 90px;" id="city:'.$assignment_item['env_no'].'">';
                                        echo $assignment_item['city'];
                                        echo '</td><td style="width: 90px;" id="state:'.$assignment_item['env_no'].'">';
                                        echo $assignment_item['state'];
                                        echo '</td><td tyle="width: 90px;" id="zip:'.$assignment_item['env_no'].'">';
                                        echo $assignment_item['zip'];
                                        echo '</td><td style="width: 90px;" id="env:'.$assignment_item['env_no'].'">';
                                        if($assignment_item['env'] != '')
                                        {
                                            if($assignment_item['env'] == 1)
                                            {
                                                echo "True";
                                            }
                                            else 
                                            {
                                                echo "False";
                                            }
                                        }
                                        echo '</td><td style="width: 90px;" id="date_assigned:'.$assignment_item['env_no'].'">';
                                        echo $assignment_item['assigned'];
                                        echo '</td><td style="width: 90px;" id="date_released:'.$assignment_item['env_no'].'">';
                                        echo $assignment_item['released'];
                                        echo '</td><td><a href="'.base_url('assignment/edit/').$assignment_item['env_no'].'"><i class="far fa-edit"></i></a></td>';
                                ?>
                                        </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>