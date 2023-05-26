<?php
include_once('includes/header.php');
include_once('../helpers/functions.php');
$cols = array(
    'username' => '',
    'vehicle_no' => "HR29292918",
    'vehicle_type' => "2",
    'chassis_no' => "38383JWJJS",
    'owner_name' => "SACHINE",
    'mobileno' => "",
);

$totalTax = 0;
$sql = "SELECT  SUM(total_tax) AS total_tax_sum FROM formData";
if (isset($_REQUEST['id']) && $_REQUEST['id'] > 0) {
    $sql = $sql . " WHERE uid = " . $_REQUEST['id'];
}

$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalTax = $row['total_tax_sum'];
} else {
    echo "Error executing query: " . mysqli_error($conn);
}

if (!is_float($totalTax)) {
    $totalTax = 0;
}

?>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="jumbotron">
                <h2 class="display-5">User's Data Analytics</h2>
                <p class="lead">This is simple data collection of all users, where you can see how much tax collected.</p>
                <hr class="my-4">
            </div>

            <h4 class="text-danger ms-5" id="delMsg"></h4>
            <h4 class="text-success ms-5" id="staMsg"></h4>

            <div class="row">
                <div class="col-sm mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h3>Total Tax</h3>
                            <p class="text-success"> RS <?= $totalTax ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <h3>Total Tax in Numbers</h3>
                            <p class="text-success text-capitalize"> <?= numberToWords($totalTax) ?></p>
                        </div>
                    </div>
                </div>


            </div>

            <table class="table table-success table-striped table-hover p-2" id="ajax-datatable">
                <h5 class="text-danger" id="delMsg"></h5>
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Sr.no</th>
                        <?php
                        foreach (array_keys($cols) as $ind => $key) {

                            echo "<th>$key</th>";
                        }
                        ?>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    var table = $('#ajax-datatable').DataTable({
        "processing": true,
        "ajax": "listajax.php?page=formdata&userId=<?= @$_GET['id'] ?>",
        "columns": [{
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: '',
            },
            {
                //data: 'id'
                data: 'SrNo',
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            <?php
            foreach (array_keys($cols) as $key) {
                echo "{ data : '$key' },";
            } ?>
        ],
        "order": [
            [1, 'asc']
        ],
        "responsive": true,

    });

    // Add event listener for opening and closing details
    $('#ajax-datatable tbody').on('click', 'td.dt-control', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });

    function format(d) {
        // `d` is the original data object for the row
        return (
            '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Total_tax:</td>' +
            '<td>' +
            d.total_tax +
            '</td>' +
            '<td>seating_cap:</td>' +
            '<td>' +
            d.seating_cap +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>barrier_district:</td>' +
            '<td>' +
            d.barrier_district +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>selected_state:</td>' +
            '<td>' + d.selected_state + '</td>' +
            '</tr>' +
            '</table>'
        );
    }
</script>

</html>