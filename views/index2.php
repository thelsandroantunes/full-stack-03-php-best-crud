<?php 
  include '../config/connect.php';
  include '../controllers/autoloader.php';
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ===== CSS Start ===== -->    
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  <!-- ===== CSS End ===== -->
  <title>CRUD</title>
</head>
<body>

    <div class="container my-4">
      <h1>Fake Persons</h1>
      <br>
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          <i class="fa fa-plus"></i> Adicionar novo cartão
      </button>
      <div class="container my-4" >
        <!-- ===== View Table Start ===== -->		    
        <table class="table table-striped table-hover" style="width:100%" id="myTable" cellspacing="0" >
          <thead class="bg-light">
            <tr>           
              <th scope="col">ID</th> 
              <th scope="col">Nome</th>
              <th scope="col">Sexo</th>
              <th scope="col" >IP</th>          
              <th scope="col">Data Criação</th>
              <th scope="col">Atualizado em</th>
              <th colspan="2">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php                      
              
              $fake_persons = FakePersonDAO::getAllFakePersons();

              if (!empty($fake_persons)){
                
                foreach ($fake_persons as $chave=>$fake) {            
                  
                  $url_photo = explode("?", $fake['photo']);            
                  $photo = isset($url_photo[0]) ? $url_photo[0] : null;

                  echo "<tr>
                          <td>". $fake['id']."</td>
                          <td>";
                  echo  '   <div class="d-flex align-items-center">
                                <img
                                  src="'.$photo.'"
                                  alt=""
                                  style="width: 45px; height: 45px"
                                  class="rounded-circle"
                                  />
                              <div class="ms-3">
                                <p class="fw-bold mb-1">'.$fake['first_name'] ." ". $fake['last_name'] .'</p>
                                <p class="text-muted mb-0">'.$fake['email'].'</p>
                              </div>
                            </div>';
                  echo "  </td>";            
                  echo "  <td>". $fake['gender']."</td>
                          <td>" . $fake['ip_address']."</td>  
                          <td>" . $fake['data_create']."</td>                   
                          <td>" . $fake['data_update']."</td>";             
                  echo '  <td>
                            <button type="button" class="view" title="Ver" id=' . $chave . '>
                            <span class="la la-eye"></span> Ver
                            </button>
                            <button type="button" class="edit" title="Editar" id=' . $chave . '>
                            <span class="la la-edit"></span>Editar
                            </button>                          
                            <button type="submit" name="delete" class="delete" title="Excluir" id=' . $chave . '><span class="la la-trash"></span>Excluir
                            </button> 
                          </td>';                            
                  echo "</tr>";            
                }
              } else {
                echo '<tr >
                        <td > </td >
                        <td > </td >
                        <td > </td >
                        <td align="center"> 0 resultados </td>
                        <td > </td >
                        <td > </td >
                        <td > </td >
                      </tr>';
              }
              
            ?>
          </tbody>
          <tfoot class="bg-light">
            <tr>           
              <th scope="col">ID</th> 
              <th scope="col">Nome</th>
              <th scope="col">Sexo</th>
              <th scope="col" >IP</th>          
              <th scope="col">Data Criação</th>
              <th scope="col">Atualizado em</th>
              <th colspan="2">Ações</th>
            </tr>
          </tfoot>
        </table> 
        <!-- ===== View Table End ===== -->
      </div>    
      <!-- ===== View Data Customer Start ===== -->
      <form id="frm" style="display: none;" >
        <div class="show modal-body" >          
          <div class="form-group col-md-6">            
              <h2 id="user-h2"></h2>
          </div> 
          <div class="modal-footer d-block mr-auto" style="text-align: -webkit-center;">          
            <div class="form-group col-md-6">
            <p> <strong>Telefone:</strong> <span class="lighter" id="user-phone"></span>.</p> 
            </div> 
            <div class="form-group col-md-2">
              <p> <strong>Endereço:</strong> <span class="lighter" id="user-address"></span>.</p>             
            </div>    
            <div>
              <div class="form-group col-md-6">
                <label>
                  <p> <strong>Cidade:</strong> <span class="lighter" id="user-city"></span>.</p>             
                </label>
                  
                <label>
                  <p> <strong>Estado:</strong> <span class="lighter" id="user-uf"></span>.</p>       
                </label>              
              </div>            
            </div>
          </div>
        </div>
      
      </form>
      <!-- ===== View Data Customer End ===== -->
    </div>
    <hr>

    <!-- ===== JS Start===== --> 
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
        crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      
      <script type="text/javascript" src="./assets/index.js"></script>
  
  
    <!-- ===== JS End ===== -->
</body>
 
</html>