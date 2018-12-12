<?php 
//~~~~~~~~~~~~~~~~~~~Functions Volunteer~~~~~~~~~~~~~~~~~~~~~~~~~
//Function who allows you to view the volunteers
function volunteersController() {
    function showAvailability($volunteer) {
        if($volunteer["availability"] == true) { 
            echo "Disponible";
        } else {
            echo "Indisponible";
        }
    }
    require("view/volunteersView.php");  
}
//Function who allows you to view the form who add the volunteer and give a value for $buttonValue
function volunteerFormAdd() {
    $buttonValue = "volunteers/add";
    if(!empty($_POST)) {
        foreach ($_POST as $key => $value) {
          $_POST[$key] = htmlspecialchars($value);
          if($key === "availability") {
            $_POST[$key] = intval($value);
          }
        }
        if(addVolunteer($_POST)) {
          header("Location: ../?message=Le bénévole a été ajouté dans la base de données!");
          exit;
        }
        else {
          header("Location: ../?message=Echec de l'enregistrement du bénévole dans la base de données");
          exit;
        }
    }
    require("view/volunteerAddView.php");
}
//Function who allows you to view the form who update the volunteer and give a value for $buttonValue
function volunteerFormUpdate() {
    $buttonValue = "volunteers/update";
    if(isset($_GET["id"])) {
        $id = htmlspecialchars($_GET["id"]);
        $volunteer = getVolunteer($id);
    }
    if(!empty($_POST)) {
        foreach ($_POST as $key => $value) {
          $_POST[$key] = htmlspecialchars($value);
        }
        if(updateVolunteer($_POST)) {
        header("Location: ../?message=Les informations sur le bénévole a été modifié dans la base de données!");
        exit;
        }
        else {
        header("Location: ../?message=Echec de la modification des informations du bénévole dans la base de données");
        exit;
        }
    }
    require("view/volunteerAddView.php");
}
//Function who allows you to delete the volunteer with the id of the volunteer in the db
function volunteerDelete() {
    $id = htmlspecialchars($_GET["id"]);
    if(deleteVolunteer($id)) {
        header("Location: ../?message=Le bénévole a bien été supprimé de la base de données!");
        exit;
    }
    require("view/volunteersView.php");
}
//~~~~~~~~~~~~~~~~~~~Functions Actions~~~~~~~~~~~~~~~~~~~~~~~~~~~
//Function who allows you to view the actions
function actionsController() {
    require("view/actionsView.php");
}
//Function who allows you to view the form who add the action and give a value for $buttonValue
function actionFormAdd() {
    $buttonValue = "actions/add";
    if(!empty($_POST)) {
        foreach ($_POST as $key => $value) {
          $_POST[$key] = htmlspecialchars($value);
        }
        if(addAction($_POST)) {
          header("Location: ../actions");
          exit;
        }
        else {
          header("Location: ../actions");
          exit;
        }
    }
    require("view/actionAddView.php");
}
//Function who allows you to view the form who update the action and give a value for $buttonValue
function actionFormUpdate() {
    $buttonValue = "actions/update";
    if(isset($_GET["id"])) {
        $id = htmlspecialchars($_GET["id"]);
        $action = getAction($id);
    }
    if(!empty($_POST)) {
        foreach ($_POST as $key => $value) {
          $_POST[$key] = htmlspecialchars($value);
        }
        if(updateAction($_POST)) {
          header("Location: ../actions");
          exit;
        }
        else {
          header("Location: ../actions");
          exit;
        }
    }
    require("view/actionAddView.php");
}
//Function who allows you to delete the action with the id of the action in the db
function actionDelete() {
    $id = htmlspecialchars($_GET["id"]);
    if(deleteAction($id)) {
        header("Location: ../actions");
        exit;
    }
    require("view/actionsView.php");
}