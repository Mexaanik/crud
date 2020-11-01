<?php

use classes\DB;

include 'init.php';
$db = DB::getInstance();
$arr = $db->prepare("select * from reference");
$arr->execute();
$result = $arr->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts.js"></script>
</head>
<body>
<div class="container">
    <button id="create" class="btn btn-primary">Create</button>
    <div class="table mt-5">
        <table class="table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Category id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Patronymic</th>
                <th>Number reference</th>
                <th>Description superpower</th>
                <th>Category Subtype</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($result as $item) { ?>
                <tr>
                    <? foreach ($item as $key => $val) { ?>
                        <td><?= $val ?></td>
                    <? } ?>
                    <td>
                        <a class="btn btn-small btn-success js-update" href="#"><i class="fa fa-pencil"
                                                                                   aria-hidden="true"></i></a>
                        <a class="btn btn-small btn-danger js-delete" href="#"> <i class="fa fa-trash"
                                                                                   aria-hidden="true"></i></a>
                    </td>
                </tr>
            <? } ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create reference</h5>
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formReference">
                        <div class="form-group" id="js-radioBtn"></div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control col-6" id="surname" name="surname" value=''
                                   placeholder="Surname" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control col-6" id="name" name="name"
                                   placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="patronymic">Patronymic</label>
                            <input type="text" class="form-control col-6" id="patronymic" name="patronymic"
                                   placeholder="Patronymic">
                        </div>
                        <div class="form-group">
                            <label for="reference">Number reference</label>
                            <input type="number" class="form-control col-6" id="reference" name="reference"
                                   placeholder="Number reference">
                        </div>
                        <div class="form-group">
                            <label for="superpower">Description superpower</label>
                            <input type="text" class="form-control col-6" id="superpower" name="superpower"
                                   placeholder="Description superpower">
                        </div>
                        <div class="form-group">
                            <label for="subtype">Description subtype</label>
                            <input type="text" class="form-control col-6" id="subtype" name="subtype" disabled
                                   placeholder="Description subtype">
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submit" class="btn btn-primary js-button-formReference">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update reference</h5>
                    <button type="button" id="closeUpdate" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="js-modal"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
