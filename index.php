<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-dark" style = "background-color:firebrick;">
            <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 fw-bold">WMSU</span>
            </div>
    </nav>
    <br>
    <br>
    <div class="container">
        <h2 class="text-center fw-bold">ELEMENTS</h2>
        <br>
    <?php
        session_start();
        if(isset($_SESSION['message'])){
            ?>
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#info-fill"/></svg>
                <div>
                    <?php echo $_SESSION['message']; ?>
                </div>
            </div>
            <?php

            unset($_SESSION['message']);
        }
    ?>
        <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Group ID
                    </th>
                    <th>
                        Atomic No
                    </th>
                    <th>
                        Atomic Weight
                    </th>
                    <th>
                        description
                    </th>
                </tr>
            </thead>

            <tbody>
            <?php
                    //include our connection
                    include_once('include/database.php');

                    $database = new Connection();
                    $db = $database->open();
                    try{	
                        $sql = 'SELECT * FROM elements;';
                        $no = 0;
                        foreach ($db->query($sql) as $row) {
                            $no++;
                ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['group_id']; ?></td>
                                <td><?php echo $row['atomic_no']; ?></td>
                                <td><?php echo $row['atomic_weight']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td align="right">
                                    <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editElement<?php echo $row['id']; ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteElement<?php echo $row['id']; ?>">Delete</a>
                                </td>
                                <?php include('minerals/view_delete_element.php'); ?>
                                <?php include('minerals/view_edit_element.php'); ?>
                            </tr>
                <?php 
                        }
                    }
                    catch(PDOException $e){
                        echo "There is some problem in connection: " . $e->getMessage();
                    }

                    //close connection
                    $database->close();

                ?>
            </tbody>
        </table>
        </div>
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addElement">Add New Element</a>
    </div>
    
    <br>
    <br>
    <br>

    <div id="footer" class="text-center text-white"  style = "background-color:firebrick;">
        <p>Developed By: </p>
        <p>Mark Angelo S. Panaguiton </p>
        <p>John Paul Madroñal</p>
    </div>

    <?php include('minerals/view_add_element.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>