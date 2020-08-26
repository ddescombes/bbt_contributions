<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BBT Reconcile Contributions</title>
        <meta name="description" content="Offering Envelope tracking.">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.1.1/superhero/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var oTable = $('#reconcile_table').dataTable({"pageLength": 30});
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
            <div class="jumbotron" style="background-color: #2b3e50;">
            <div class="page-header" id="banner">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-sm-6" style="margin-bottom:25px">
                        <h1>BBT Contributions</h1>
                        <p class="lead">Reconcile</p>
                    </div>
                </div>
            </div>
            <table class="table table-hover" id='reconcile_table' style="width: 100%">
                <thead>
                    <tr>
                    <th scope="col">Env</th>
                    <th scope="col">Date</th>
                    <th scope="col">Regular</th>
                    <th scope="col">Missions</th>
                    <th scope="col">Special</th>
                    <th scope="col">Taxed</th>
                    <th scope="col">Other</th>
                    <th scope="col">Taxed</th>
                    <th scope="col">Total</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Check#</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contributions as $contribution_item):
                         echo 
                             '<tr class="table-active"><td style="width: 30px;" id="Env_No:'.$contribution_item['EnvSysID'].'">';
                             echo $contribution_item['Env_No']; 
                             echo '</td><td tyle="width: 90px;" id="giftdate:'.$contribution_item['EnvSysID'].'">';
                             echo $contribution_item['giftdate'];
                             echo '</td><td style="width: 90px;" id="regular:'.$contribution_item['EnvSysID'].'">$';
                             echo number_format($contribution_item['regular'], 2);
                             echo '</td><td style="width: 90px;" id="missions:'.$contribution_item['EnvSysID'].'">$';
                             echo number_format($contribution_item['missions'], 2);
                             echo '</td><td style="width: 90px;" id="special:'.$contribution_item['EnvSysID'].'">$';
                             echo number_format($contribution_item['special'], 2);
                             echo '</td><td tyle="width: 90px;" id="special_taxed:'.$contribution_item['EnvSysID'].'">';
                             if($contribution_item['special'] != '')
                             {
                                if($contribution_item['special_taxed'] == 1)
                                {
                                    echo "True";
                                }
                                else 
                                {
                                    echo "False";
                                }
                             }
                             echo '</td><td tyle="width: 90px;" id="other:'.$contribution_item['EnvSysID'].'">$';
                             echo number_format($contribution_item['other'], 2);
                             echo '</td><td style="width: 90px;" id="other_taxed:'.$contribution_item['EnvSysID'].'">';
                             if($contribution_item['other'] != '')
                             {
                                if($contribution_item['other_taxed'] == 1)
                                {
                                    echo "True";
                                }
                                else 
                                {
                                    echo "False";
                                }
                             }
                             echo '</td><td style="width: 90px;" id="total:'.$contribution_item['EnvSysID'].'">$';
                             echo number_format($contribution_item['total'], 2);
                             echo '</td><td style="width: 90px;" id="remark:'.$contribution_item['EnvSysID'].'">';
                             if(strlen($contribution_item['remarks'])>1)
                             {
                                echo $contribution_item['remarks']; 
                             }
                             echo '</td><td style="width: 90px;" id="check_no:'.$contribution_item['EnvSysID'].'">';
                             echo $contribution_item['check_no'];
                             echo '</td><td><a href="'.base_url('contribution/edit_contribution/').$contribution_item['EnvSysID'].'"><i class="far fa-edit"></i></a></td>';
                             ?>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>                                    
    </body>
</html>