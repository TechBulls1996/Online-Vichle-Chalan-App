<?php
include_once('includes/header.php');
?>

<body>
    <div class="container-fluid mt-3">

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
</script>

</html>