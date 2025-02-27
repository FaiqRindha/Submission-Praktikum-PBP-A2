<!-- Nama: Fa'iq Rindha Maulana -->
<!-- NIM: 24060121130091 -->
<!-- Lab: PBP A2 -->
<!-- Nama File: view_customer.php -->
<!-- Deskripsi File: Halaman untuk menampilkan daftar customer -->
<!-- Tanggal Pembuatan: 22/09/2023 -->

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <title>Document</title>
   </head>
   <body>
      <div class="card">
         <div class="card-header">Customer Data</div>
         <div class="card-body">
            <br>
            <a class="btn btn-primary" href="add_customer.php">+ Add Customer Data</a><br /><br />
            <table class="table table-striped">
               <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Action</th>
               </tr>

               <?php
                  session_start(); //inisialisasi session
                  if (!isset($_SESSION['username'])) {
                     header('Location: login.php');
                  }
                  // Include our login  information
                  require_once('./db_login.php');
                  // Execute the query
                  $query = "SELECT * FROM customers ORDER BY customerid";
                  $result = $db->query($query);
                  if (!$result) {
                     die("Could not query the database: <br />" . $db->error . "<br/>Query: " . $query);
                  }
                  // Fetch and display the results
                  $i = 1;
                  while ($row = $result->fetch_object()) {
                     echo '<tr>';
                     echo '<td>' . $i . '</td>';
                     echo '<td>' . $row->name . '</td>';
                     echo '<td>' . $row->address . '</td>';
                     echo '<td>' . $row->city . '</td>';
                     echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . $row->customerid . '">Edit<a/>&nbsp;&nbsp;
                           <a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id=' . $row->customerid . '">Delete</a>
                           </td>';
                     echo '</tr>';
                     $i++;
                  }
                  echo '</table>';
                  echo '<br />';
                  echo 'Total Rows = ' . $result->num_rows;
                  $result->free();
                  $db->close();
               ?>
               <br><br>
               <a class="btn btn-primary" href="logout.php">Logout</a>
            </table>
         </div>
      </div>
   </body>
</html>