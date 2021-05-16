<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAG -->
<?php $this->load->view('includes/head.php'); ?>

<body class="">

  <!-- WRAPPER -->
  <div class="wrapper ">

    <!-- SIDEBAR -->
    <?php $this->load->view('includes/sidebar.php'); ?>
    
    <!-- MAIN CONTENT -->
    <div class="main-panel">

      <!-- NAVBAR -->
      <?php $this->load->view('includes/navbar.php'); ?>

      <!-- OPENING TAG OF CONTENT -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- END OF OPENING TAG OF CONTENT -->

            <div class="card card-nav-tabs" style="width: 100rem;">
                <div class="card-header card-header-danger">
                    Create Bus Type  
                </div>
                <div class="card-body">
                    <form id="addBusTypeForm" name="addBusTypeForm">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bus Type</label>
                            <input type="text" class="form-control" name="busTypeName"  id="busTypeName" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" class="form-control" name="busTypeDescription"  id="busTypeDescription" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select class="form-control" name="busTypeStatus"  id="busTypeStatus" aria-describedby="emailHelp">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card">
              <div class="card-body">
                <table id="busTypeTable" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bus Type</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
              </div>
            </div>

            <!-- CLOSING TAG OF CONTENT -->
          </div>
        </div>
      </div>

      <!-- END OF CLOSING TAG OF CONTENT -->

      <div id="busTypeInfoModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bus Type Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editBusTypeForm">
                    <div class="modal-body">
                        <input hidden type="text" class="form-control" name="editBusTypeId" id="editBusTypeId" aria-describedby="emailHelp">
                        <input type="text" class="form-control" name="editBusTypeName" id="editBusTypeName" aria-describedby="emailHelp">
                        <input type="text" class="form-control" name="editBusTypeDescription" id="editBusTypeDescription" aria-describedby="emailHelp">
                        <input type="text" class="form-control" name="editBusTypeStatus" id="editBusTypeStatus" aria-describedby="emailHelp">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div id="deleteBusTypeInfoModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bus Type Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteBusTypeForm">
                    <div class="modal-body">
                        <input hidden type="text" class="form-control" name="editBusTypeId" id="editBusTypeId" aria-describedby="emailHelp">
                        <input type="text" class="form-control" name="editBusTypeName" id="editBusTypeName" aria-describedby="emailHelp">
                        <input type="text" class="form-control" name="editBusTypeDescription" id="editBusTypeDescription" aria-describedby="emailHelp">
                        <input type="text" class="form-control" name="editBusTypeStatus" id="editBusTypeStatus" aria-describedby="emailHelp">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
                </div>
            </div>
        </div>
      
      <!-- FOOTER -->
      <?php $this->load->view('includes/footer.php')?>

    </div>
    <!-- END OF MAIN CONTENT -->

  </div>
  <!-- END OF WRAPPER -->

  <!-- FIXED PLUGINS -->
  
  <!-- FIXED PLUGINS -->
  <?php $this->load->view('includes/core_js_files.php')?>
  
</body>
<script>
    // DATA TABLES
    function loadtable(){
        function loadtable(){
        userDataTable = $('#userTable').DataTable( {
            "ajax": "<?php echo base_url()?>user/show_user",
            "columns": [
                { data: "id"},
                { data: "firstName", render: function(data, type, row){
                        return `${row.firstName} ${row.lastName}`
                    }
                },
                { data: "lastName"},
                { data: "email"},
                { data: "created_at" },
                { data: "status", render: function(data, type, row){
                        if(data == "Active"){
                            return '<div class="btn-group">'+
                                    '<button class="btn btn-primary btn-sm btn_view" value="'+row.id+'" title="View" type="button" ><i class="zmdi zmdi-eye"></i>View</button>'+
                                    '<button class="btn btn-warning btn-sm btn_view" value="'+row.id+'" title="Edit" type="button" ><i class="zmdi zmdi-edit"></i>Edit</button>'+
                                    '<button class="btn btn-danger btn-sm btn_delete" value="'+row.id+'" title="Delete" type="button"> <i class="zmdi zmdi-delete"></i>Delete</button></div>';
                        }   
                        else{
                            return '<button>Activate</button>';
                        }
                    }
                    
                },

            ],

            "aoColumnDefs": [{ "bVisible": false, "aTargets": [0, 4] }],
            "order": [[4, "desc"]]
        })
    }

    loadtable();
    
    function refresh(){
        var url = "<?php echo base_url()?>user/show_user";

        userDataTable.ajax.url(url).load();
    }

    // CREATE BUS TYPE
    $('#addBusTypeForm').on('submit', function(e){
        e.preventDefault();

        var form = $('#addBusTypeForm'); 

        // ajax opening tag
        $.ajax({
            url: '<?php echo base_url()?>bus_type/add_bus_type/',
            type: "POST",
            data: form.serialize(),
            dataType: "JSON",
        
            success: function(data){
                refresh();

                $("#addBusTypeForm").trigger("reset");
                // End of Confirmation

                
            }
        // ajax closing tag
        })
    });

    // VIEW BUS TYPE
    $.ajax({
            url: '<?php echo base_url()?>bus_type/get_one_bus_type',
            type: "POST",
            data: { id: id },
            dataType: "JSON",
        
            success: function(data){
                console.log(data);
                var busTypeInfo = data.data;

                $('#editBusTypeId').val(id);
                $('#editBusTypeName').val(busTypeInfo.name);
                $('#editBusTypeDescription').val(busTypeInfo.description);
                $('#editBusTypeStatus').val(busTypeInfo.status);

                $('#busTypeInfoModal').modal('hide');
            }
        // ajax closing tag
        })
    });

    // EDIT BUS TYPE 
    $('#editBusTypeForm').on('submit', function(e){
        e.preventDefault();

        console.log('working');

        var form = $('#editBusTypeForm'); 

        // ajax opening tag
        $.ajax({
            url: '<?php echo base_url()?>bus_type/edit_bus_type/',
            type: "POST",
            data: form.serialize(),
            dataType: "JSON",
        
            success: function(data){
                refresh();

                $("#addBusTypeForm").trigger("reset");
                // End of Confirmation
                $('#busTypeInfoModal').modal('hide');
                
                alert(data.message);
            }
        // ajax closing tag
        })
    });

    $(document).on("click", ".btn_delete", function(){
        var id = this.value;
        // console.log(id);

        var form = $('#deleteBusTypeForm'); 

        $.ajax({
            url: '<?php echo base_url()?>bus_type/delete_bus_type/',
            type: "POST",
            data: form.serialize(),
            dataType: "JSON",
        
            success: function(data){
                console.log(data);

                $('#deleteBusTypeInfoModal').modal('show');

                alert(data.message);
            }
        // ajax closing tag
        })
    });
</script>

<!-- FIXED SCRIPTS -->
<?php $this->load->view('includes/fixed_scripts.php')?>

</html>


