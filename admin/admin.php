<?php
include_once('includes/header.php');
?>

<div class="container-fluid mt-3">
    <button type="button" class="btn btn-outline-warning mb-3" data-bs-toggle="modal" data-bs-target="#addUser">Add
        User</button>
    <div class="row">
        <div class="col-md-12 mb-3">
            <h4 class="text-danger ms-5" id="delMsg"></h4>
            <h4 class="text-success ms-5" id="staMsg"></h4>

            <table class="table table-success table-striped table-hover p-2" id="ajax-datatable">
                <h5 class="text-danger" id="delMsg"></h5>
                <thead>
                    <tr>
                        <th scope="col">Sr.no</th>
                        <th scope="col">Username</th>

                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">

</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    var dataSrc = [];
    //var i = 1;
    var table = $('#ajax-datatable').dataTable({
        "processing": true,
        "ajax": "listajax.php",
        "columns": [{
                //data: 'id'
                data: 'SrNo',
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: 'username'
            },

            {
                render: (data, type, row) => {
                    if (row.status == 'active') {
                        return `<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="viewStatus" value='${row.id}' style='height:20px; width:3em;' checked>
  
</div>`;
                    } else {
                        return `<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="viewStatus" value='${row.id}' style='height:20px; width:3em;'>
  
</div>`;
                    }


                }
            },


            {
                render: (data, type, row) => {
                    return `<a href='formData.php?id=${row.id}' class='btn-sm btn btn-info'>View</a>  <button class='btn-sm btn btn-danger ms-2' id="delValue" value='${row.id}'>Delete</button>`;

                }

            },

        ]
    });

    $(document).on('click', '#viewUser', function() {
        let viewVal = $(this).val();
        $.ajax({
            url: 'adminAjax.php',
            method: 'post',
            data: {
                viewVal: viewVal,
                view: "view"
            },
            success: function(result) {

                var msg = $.parseJSON(result);
                $("#l1").html("Username - " + msg.name)

                $("#l3").html("Status - " + msg.status)
            }
        })
    })

    $(document).on('click', '#delValue', function() {
        let delVal = $(this).val();
        var deElement = this;
        $.ajax({
            url: 'adminAjax.php',
            method: 'post',
            data: {
                delVal: delVal,
                delete: "delete"
            },
            success: function(result) {
                table.DataTable().ajax.reload();
                $(deElement).closest("tr").fadeOut();
                var delmsg = $.parseJSON(result);

                $("#delMsg").html(delmsg.msg);
                setTimeout(() => {
                    $("#delMsg").html("");
                }, 5000);
            }
        })
    })



    $("#addUser").submit(function() {
        event.preventDefault();
        let name = $("#username").val();
        let email = $("#email").val();
        let selstatus = $("#selStatus").val();

        $.ajax({
            url: 'adminajax.php',
            method: 'post',
            data: {
                name: name,
                email: email,
                selstatus: selstatus,
                insert: "insert"
            },
            success: function(result) {
                table.DataTable().ajax.reload();
                var msg = $.parseJSON(result);
                $("#inMsg").html(msg.msg);
                $("#addUser")[0].reset();
                setTimeout(() => {
                    $("#inMsg").html("");
                }, 4000);
                setTimeout(() => {
                    $('.btn-close').trigger('click');
                }, 5000);
            }
        })

    })
</script>

</html>