<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
</head>
<body>
  <table id="Data_Table" width="100%">
    <thead>
       <tr>
         <td>ID</td>
         <td>Employee Name</td>
         <td>Job Role</td>
         <td>Competency Level</td>
         <td>Action</td>
       </tr>
     </thead>
         <tbody>
            <tr>
               <form method="post">
                 <td>Ciao</td>
                 <td>John Smith</td>
                 <td>Accountant</td>
                 <td>3</td>
                 <td>
                     <button type="button" class="view_emp" title="View Record">
                     <span class="la la-eye"></span> View
                     </button>
                     <button type="button" class="edit_emp" title="Update Record">
                     <span class="la la-edit"></span>Update
                     </button>
                     <input type="checkbox" name="keyToDelete" value="<?php echo $row['id']; ?>" required>
                      <button type="submit" name="delete_employee" class="delete_employee" title="Delete Record"><span class="la la-trash"></span>Delete
                      </button>
                   </td>
                 </form>
            </tr>
       </tbody>
  </table>
</body>
<script type="text/javascript">
  $(document).ready( function () {
    $('#Data_Table').DataTable();
} );
</script>
</html>
