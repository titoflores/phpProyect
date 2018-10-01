<?php
require_once '../Services/ClassPersonaServ.php';

$per = new ClassPersonaServ();
 $result = $per->mostrarPersona();

if (isset($_GET['idPersona'])) {
    $idPersona = $_GET['idPersona'];
    $resul2 = mysql_fetch_array($per->leerRegistro($idPersona));
    $resul2[0];
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>
    <body>

        <!-- Image and text -->
        <!-- Image and text -->
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                Modulo 9
            </a>
        </nav>
        <br>
        <div class="container">
            <form action="../Services/Persona.php" method="GET">
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="name" class="form-control" name="exampleInputName" aria-describedby="NameHelp" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputLastName">Last Name</label>
                    <input type="lastName" class="form-control" name="exampleInputLastname" aria-describedby="lastNameHelp" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputDate">Birthdate</label>
                    <input type="date" class="form-control" name="exampleInputBirthdate" placeholder="Date">
                </div>

                <button type="submit" name="new" class="btn btn-primary">New</button>
            </form>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php while ($row = mysql_fetch_array($result)) { ?>
                        <tr> 
                    <form method="GET" action="#">
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['lastName']; ?></td>
                        <td><?php echo $row['Birthdate']; ?></td>
                        <td>
                            <input type="hidden" name="idPersona" value="<?php echo $row['idPersona']; ?>">
                            <button type="submit"  data-toggle="modal" data-target="#exampleModal">Edit</button> | 
                            <button type="submit"  data-toggle="modal" data-target="#exampleModa2">Delete</button>
                        </td>
                    </form>
                    </tr>
<?php } ?>

                </tbody>
            </table>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="../Services/Persona.php" method="GET">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Persona</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="name" class="form-control" name="exampleInputName" aria-describedby="NameHelp" value="<?php echo $resul2[1]; ?>" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputLastName">Last Name</label>
                                <input type="lastName" class="form-control" name="exampleInputLastname" aria-describedby="lastNameHelp" value="<?php echo $resul2[2]; ?>" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDate">Birthdate</label>
                                <input type="date" class="form-control" name="exampleInputBirthdate" value="<?php echo $resul2[3]; ?>" placeholder="Date">
                            </div>     
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idPersona" value="<?php echo $resul2[0]; ?>">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="../Services/Persona.php" method="GET">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Persona</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleInputName"> <strong>Name :</strong> <?php echo $resul2[1]; ?></label>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputLastName"><strong>Last Name :</strong> <?php echo $resul2[2]; ?></label>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputDate"><strong>Birthdate :</strong> <?php echo $resul2[3]; ?></label>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idPersona" value="<?php echo $resul2[0]; ?>">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="delete" class="btn btn-primary">Eliminar</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>