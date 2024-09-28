<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                        <?php echo display('contra_voucher') ?>
                    </h4>
                </div>
            </div>
            <div class="panel-body">

                <?php echo  form_open_multipart('account/accounts/store_contra_voucher') ?>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label for="vo_no" class="col-sm-4 col-form-label"> <?php echo display('voucher_type') ?></label>
                                <div class="col-sm-8">
                                    <input type="text" name="txtVNo" id="txtVNo" value="Contra" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ac" class="col-sm-4 col-form-label">Transferred From*</label>
                                <div class="col-sm-8">
                                    <select name="cmbDebit" id="cmbDebit" class="form-control" onchange="myFunction()" required>
                                        <option value="">Please select One</option>

                                        <?php foreach ($acc as $cracc) { ?>
                                            <option value="<?php echo $cracc->HeadCode ?>"><?php echo $cracc->HeadName ?></option>
                                        <?php  } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-sm-4 col-form-label"> <?php echo display('date') ?></label>
                                <div class="col-sm-8">
                                    <input type="text" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php echo  date('Y-m-d') ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="txtRemarks" class="col-sm-4 col-form-label"> <?php echo display('remark') ?></label>
                                <div class="col-sm-8">
                                    <textarea name="txtRemarks" id="txtRemarks" class="form-control"></textarea>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div id="myDiv" style="display:none;">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Cheque No</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="chequeno" id="chequeno" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="effectivedate" class="col-sm-4 col-form-label"> Effective Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="effectivedate" id="effectivedate" class="form-control datepicker" value="<?php echo  date('Y-m-d') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="draftdate" class="col-sm-4 col-form-label"> Draft Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="draftdate" id="draftdate" class="form-control datepicker" value="<?php echo  date('Y-m-d') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-4 col-form-label"> <?php echo display('description') ?></label>
                                    <div class="col-sm-8">
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="debtAccVoucher">
                        <thead>
                            <tr>
                                <th width="20%" class="text-center"> Transfered To*</th>
                                <th width="30%" class="text-center"><?php echo display('ledger_comment') ?></th>
                                <th width="25%" class="text-center"> Amount</th>
                            </tr>
                        </thead>
                        <tbody id="debitvoucher">
                            <tr>
                                <td class="expenseincometd">
                                    <select name="cmbCode[]" id="cmbCode_1" class="form-control" required>
                                        <option value="">Please select One</option>
                                        <?php foreach ($acc as $acc1) { ?>
                                            <option value="<?php echo $acc1->HeadCode; ?>"><?php echo $acc1->HeadName; ?></option>
                                        <?php } ?>
                                    </select>

                                </td>
                                <td><input type="text" name="txtComment[]" step=".01" value="" class="form-control " id="txtComment_1" />
                                </td>
                                <td><input type="number" name="txtAmount[]" step=".01" value="" placeholder="0.00" class="form-control total_price text-right" id="txtAmount_1" onkeyup="calculationcontra(1)">
                                </td>
                                <!-- <td><input type="number" name="txtAmountcr[]" value="" placeholder="0.00" class="form-control total_price1 text-right" id="txtAmount1_1" onkeyup="calculationcontra(1)">
                                </td> -->

                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
                <input type="hidden" name="finyear" value="<?php echo financial_year(); ?>">
                <div class="form-group form-group-margin row">

                    <div class="col-sm-12 text-right">

                        <input type="submit" id="add_receive" class="btn btn-success btn-large" name="save" value="<?php echo display('save') ?>" tabindex="9" />
                        <input type="hidden" name="" id="base_url" value="<?php echo base_url(); ?>">
                        <input type="hidden" name="" id="headoption" value="<option value=''> Please select</option><?php foreach ($acc as $acc2) { ?><option value='<?php echo $acc2->HeadCode; ?>'><?php echo $acc2->HeadName; ?></option><?php } ?>">
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cheques</h4>
            </div>
            <div class="modal-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cheque No</th>
                            <th>Customer Name</th>
                            <th>Effective Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function handleTableClick(rowId, customerId, amount, chequeno, draftdate, effectivedate, description) {
        // Parse JSON string back to object
        // rowData = JSON.parse(rowData);
        // Handle click here
        // if (id == 0) {
        //     $('#pamount_by_method').val(amount);
        //     $('#pamount_by_method').prop('readonly', true);


        // } else {
        //     $('#pamount_by_method' + id).val(amount);
        //     $('#pamount_by_method' + id).prop('readonly', true);


        // }
        // $('#' + "che_" + id).hide();
        // $('#' + "myDiv_" + id).show();


        $('#chequeno' ).val(chequeno);
        $('#chequeno').prop('readonly', true);

        $('#draftdate' ).val(draftdate);
        $('#draftdate').prop('readonly', true);


        $('#effectivedate' ).val(effectivedate);
        $('#effectivedate' ).prop('readonly', true);

        

        $('#description' ).val(description);
        $('#txtAmount_1' ).val(amount);
        $('#txtAmount_1' ).prop('readonly', true);


        
       // $('#effectivedate' ).prop('readonly', true);



        $("#myDiv").show();
        $("#exampleModal").modal('hide');




        // You can access properties of rowData as needed
    }

    function myFunction() {
        var x = document.getElementById("cmbDebit").value;
        var is_credit_edit = '';
        var csrf_test_name = '';

        $('#chequeno' ).val("");
        $('#draftdate' ).val("");
        $('#effectivedate' ).val("");
        $('#description' ).val("");
        $('#txtAmount_1' ).val("");
        $("#myDiv").hide();
        $('#txtAmount_1' ).prop('readonly', false);

    

        var url = $('#base_url').val() + "purchase/purchase/bdtask_typeofthepayment/" + x;
        $.ajax({
            type: "post",
            url: url,
            data: {
                is_credit_edit: is_credit_edit,
                csrf_test_name: csrf_test_name
            },
            success: function(data) {
                var parsedData = JSON.parse(data);



                if (parsedData[0].HeadName === '3rd party cheque') {

                    $("#exampleModal").modal('show');

                    var url1 = $('#base_url').val() + "purchase/purchase/getallcheques";
                    $.ajax({
                        type: "post",
                        url: url1,
                        data: {
                            csrf_test_name: csrf_test_name,
                            is_credit_edit: is_credit_edit
                        },
                        success: function(data1) {

                            var parsedData1 = JSON.parse(data1);
                            console.log(parsedData1);
                            $('#example').DataTable({
                                "bDestroy": true,
                                "data": parsedData1, // Use parsed data as the DataTable source
                                "columns": [{
                                        "data": "cheque_no"
                                    },
                                    {
                                        "data": "customer_name"
                                    },
                                    {
                                        "data": "effectivedate"
                                    },
                                    {
                                        "data": "amount"
                                    },
                                    {
                                        "data": "status"
                                    },
                                    {
                                        "data": null,
                                        "render": function(data, type, row) {
                                            // Check if row exists
                                            if (row) {
                                                // console.log(row.draftdate)
                                                // // Encode row data to prevent errors in JSON stringification
                                                // var draftDateString = row.draftdate.toISOString(); // or use any desired date format
                                                // var effectiveDateString = row.effectivedate.toISOString();

                                                return '<button class="btn btn-primary" onclick="handleTableClick(' + row.id + ',' + row.customer_id + ',' + row.amount + ',\'' + row.cheque_no + '\',\'' + row.draftdate + '\',\'' + row.effectivedate + '\',\'' + row.description + '\')">Call</button>';
                                            } else {
                                                return ''; // Return empty string if row is null or undefined
                                            }
                                        }
                                    }

                                ]
                            });
                        }
                    });
                }


            }
        });

    }
</script>

<script src="<?php echo base_url() ?>assets/dist/jstree.min.js"></script>
<script src="<?php echo base_url('assets/dist/account.js') ?>" type="text/javascript"></script>