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
  <title>Document</title>
  <!-- ===== CSS Start ===== -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

  <link rel="stylesheet" href="assets/index.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- ===== CSS End ===== -->

</head>

<body>
  <div class="container my-4">
    <h1>Fake Persons</h1>
    <br>
    <button class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="top" title="Cadastrar">
      <i class="fa fa-plus"></i> Novo Usuário
    </button>
    <div class="container my-4">
      <!-- ===== View Table Start ===== -->
      <table class="table table-striped table-hover" id="myTable" width="100%">
        <thead class="bg-light" style="font-size:14px">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Gênero</th>
            <th scope="col">IP</th>
            <th scope="col">Data Criação</th>
            <th scope="col">Atualizado em</th>
            <th scope="col">Ações</th>
            <th style="display:none;">Sobre</th>
            <th style="display:none;">Mídia Social</th>
            <th style="display:none;">Cargo</th>
            <th style="display:none;">Empresa</th>
          </tr>
        </thead>
        <tbody>
          <?php                                                  
            $fake_persons = FakePersonDAO::getAllFakePersons();
            if (!empty($fake_persons)){                    
              foreach ($fake_persons as $chave=>$fake) {                                  
                $url_photo = explode("?", $fake['photo']);            
                $photo = isset($url_photo[0]) ? $url_photo[0] : null;

                echo '<tr style="font-size:14px">';
                echo "  <td>". $fake['id']."</td>
                        <td>";
                echo  '   <div class="d-flex align-items-center">
                              <img
                                src="'.$photo.'"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle fake_img"
                                id="fake_img"
                                />
                            <div class="ms-3">
                              <p class="fw-bold mb-1 fake_name" id="fake_name">'.$fake['first_name'] ." ". $fake['last_name'] .'</p>                              
                              <p class="text-muted mb-0 fake_email" id="fake_email">'.$fake['email'].'</p>
                            </div>
                          </div>';
                echo "  </td>";            
                echo "  <td>". $fake['gender']."</td>
                        <td>" . $fake['ip_address']."</td>  
                        <td>" . $fake['data_create']."</td>                   
                        <td>" . $fake['data_update']."</td>";                
                echo '  <td>';
                echo     '<a href="#" data-toggle="modal" data-target="#modalShow" class="view btn btn-outline-primary btn-sm"  title="Visualizar" id="'.$fake['id'].'"><i class="fa fa-fw fa-eye" style="font-size:14px" id="'.$fake['id'].'"></i></a>
                          <a href="#" class="edit btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar cadastro" id="'.$fake['id'].'"><i class="fa fa-fw fa-edit" style="font-size:14px" id="'.$fake['id'].'"></i></a>
                          <a href="#" class="delete btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="left" title="Excluir cadastro" id="'.$fake['id'].'"><i class="fa fa-fw fa-trash" style="font-size:14px" id="'.$fake['id'].'"></i></a>
                        </td>';         
                echo '  <td style="display:none;">'. $fake['about'].'</td>
                        <td style="display:none;">'. $fake['social_midia'].'</td>
                        <td style="display:none;">'. $fake['office'].'</td>
                        <td style="display:none;">'. $fake['company'].'</td>';
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
        <tfoot class="bg-light" style="font-size:14px">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Gênero</th>
            <th scope="col">IP</th>
            <th scope="col">Data Criação</th>
            <th scope="col">Atualizado em</th>
            <th scope="col">Ações</th>
            <th style="display:none;">Sobre</th>
            <th style="display:none;">Mídia Social</th>
          </tr>
        </tfoot>
      </table>
      <!-- ===== View Table End ===== -->
    </div>
  </div>

  <!-- ===== Modal Show Start ===== -->
  <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <div class="img-fake">
            <img src="" alt="fake-img" id="imgViewModal" />
          </div>
          <div>
            <h2 id="nameViewModal"> Fake First Name </h2>
            <h7><i class="fa fa-briefcase" aria-hidden="true"></i><span id="officeViewModal"> Fake Office</span></h7></br>
            <h7><i class="fa fa-institution" aria-hidden="true"></i><span id="companyViewModal"> Fake Company</span></h7></br>
            <h7><i class="fa fa-envelope" aria-hidden="true"></i><span id="emailViewModal"> Fake Email</span></h7>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ===== Modal Show End ===== -->
  <!-- ===== JS Start===== -->
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="./assets/index.js"></script>
  <!-- ===== JS End===== -->
</body>

</html>