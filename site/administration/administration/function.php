<?php

// <!-- -------------------------------------------------------------------------------------------
//                         FUNCTION CONNEXION DATABASE
// -------------------------------------------------------------------------------------------- -->
function bdd(){
    $bdd = new PDO('mysql:host=sql.alls-heberg.fr;dbname=nassere19322;charset=utf8', 'nassere19322', 'ZQ9OCUIN5!nuFRB');
    return $bdd;
}

// <!-- -------------------------------------------------------------------------------------------
//                         END FUNCTION CONNEXION DATABASE
// -------------------------------------------------------------------------------------------- -->


// <!-- -------------------------------------------------------------------------------------------
//                         FUNCTION DISPLAY DATABASE
// -------------------------------------------------------------------------------------------- -->

function liste(){
    $bdd=bdd();
    // REQUEST
    $sql = 'SELECT * FROM `intervention`';

    // PREPARATION OF REQUEST
    $query = $bdd->prepare($sql);

    // EXECUTE OF REQUEST
    $query->execute();

    $reponse = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($reponse as $produit){
                   
    echo "<tr>
        <td>".$produit['id_intervention']."</td>
        <td>".$produit['date_intervention']."</td>
        <td>".$produit['type_intervention']."</td>
        <td>".$produit['etage_intervention']."</td>
        </tr>";
                        
        }
    }
      
// <!-- -------------------------------------------------------------------------------------------
//                         END FUNCTION DISPLAY DATABASE
// -------------------------------------------------------------------------------------------- -->





//=======================================================================================================
//                          <!-- FUNCTION ADD A STAIN -->
//======================================================================================================= -->

function add(){
    $bdd=bdd();
    if(isset($_POST['ajouter'])&&!empty($_POST['date'])&&!empty($_POST['type'])&&!empty($_POST['etage'])){
    $req = bdd()->prepare('INSERT INTO intervention (id_intervention, date_intervention, type_intervention, etage_intervention) VALUES (NULL, :date, :type, :etage)');
    $req->execute(array(
    'date' => $_POST['date'],
    'type' => $_POST['type'],
    'etage' => $_POST['etage'],));

    echo 'La nouvelle tache à etait ajouter';
    echo '<script language="Javascript">
                document.location.replace("add.php");
                </script>';
    }
}

//=======================================================================================================
//                          <!-- END FUNCTION ADD A STAIN -->
//======================================================================================================= -->


//=======================================================================================================
//                          <!-- FUNCTION REQUEST COUNT NUMBER OF STAIN -->
//======================================================================================================= -->
function compter() {
    $bdd=bdd();
    $req=$bdd->query("SELECT COUNT(*) FROM intervention"); 
}
//=======================================================================================================
//                          <!-- FUNCTION COUNT NUMBER OF STAIN -->
//======================================================================================================= -->



// =======================================================================================================
//                     <!--  FUNCTION UPDATE OR DELETE STAIN   -->
// =======================================================================================================

function update(){
    $bdd=bdd();
    $recuperation = $bdd->query('SELECT * FROM intervention');
    while ($tache = $recuperation->fetch()) {
    echo " <form>
    <div>
    <center>
    Id : <input type='text' class='form-control' name='id' value='".$tache['id_intervention']."'>
    Date : <input type='date' class='form-control' name='date' value='".$tache['date_intervention']."'>
    Type : <input type='text' class='form-control' size='20' name='type' value='".$tache['type_intervention']."'>
    Etage : <input type='text' class='form-control' name='etage' value='".$tache['etage_intervention']."'>
  
    <button type='submit' class='btn btn-dark mt-1' value='modifier' name='modifier'>Modifier</button>
    <button type='submit' class='btn btn-danger mt-1' value='supprimer' name='supprime'>Supprimer</button></center><br />

    </form>
    </div>";
    }
    if(isset($_GET['modifier'])&&!empty($_GET['id'])&&!empty($_GET['type'])){
        $id=$_GET['id'];
        $req = $bdd->prepare('UPDATE intervention SET date_intervention = :date, type_intervention = :type, etage_intervention = :etage WHERE id_intervention= :id');
        $req->execute(array(
        'date' => $_GET['date'],
        'type' => $_GET['type'],
        'etage' => $_GET['etage'],
        ':id' => $id ));
        echo "la modification a été effectuée ";
        echo '<script language="Javascript">
        document.location.replace("update.php");
        </script>';
        }
}

// ---------------- DELETE ----------------------------------

function delete(){
    $bdd=bdd();
    if(isset($_GET['supprime'])&&!empty($_GET['id'])){
    $id=$_GET['id'];
    $req = $bdd->prepare('DELETE FROM intervention WHERE id_intervention= :id');
    $req->execute(array(
    ':id' => $id ));
    echo "l'intervention a été supprimé.";
    echo '<script language="Javascript">
        document.location.replace("update.php");
        </script>';
    }
}

// =======================================================================================================
//                     <!-- END FUNCTION UPDATE OR DELETE STAIN   -->
// =======================================================================================================



// =======================================================================================================
//                     <!-- END FUNCTION HISTORIQUE   -->
// =======================================================================================================

function historique(){
    $bdd=bdd();
    if(isset($_GET['action']) && $_GET['action']=="historique"){
    $etage = $_GET['etage'];
    $recup= $bdd->prepare('SELECT * FROM intervention WHERE etage_intervention = :etage');
    $recup->bindParam(':etage', $etage);
    $recup->execute();

    echo '<div class="container">
    <h4 class=" text-center py-3"> Historique Etage '.$etage.'</h4>
    <table class="table">
    <thead class="bg_entete_tab">
    <tr>
    <th scope="col">etage</th>
    <th scope="col">type</th>
    <th scope="col">date</th>
    </tr>
    </thead>
    <tbody>';

    

    while($donnees = $recup->fetch())
    {
    echo '<tr class=" "><td>'.$donnees['etage_intervention'].'</td><td>'.$donnees['type_intervention'].'</td><td>'.$donnees['date_intervention'].'</td></tr>';
    }
    echo'</tbody></table></div>';
    }

}


function historiques(){
    $bdd=bdd();
    if(isset($_GET['actio']) && $_GET['actio']=="historiques"){
    $date = $_GET['date'];
    $recup= $bdd->prepare('SELECT * FROM intervention WHERE date_intervention = :date');
    $recup->bindParam(':date', $date);
    $recup->execute();

    echo '<div class="container">
    <h4 class=" text-center py-3"> Historique date '.$date.'</h4>
    <table class="table">
    <thead class="bg_entete_tab">
    <tr>
    <th scope="col">date</th>
    <th scope="col">type</th>
    <th scope="col">etage</th>
    </tr>
    </thead>
    <tbody>';

    

    while($donnees = $recup->fetch())
    {
    echo '<tr class=" "><td>'.$donnees['date_intervention'].'</td><td>'.$donnees['type_intervention'].'</td><td>'.$donnees['etage_intervention'].'</td></tr>';
    }
    echo'</tbody></table></div>';
    }

}


// =======================================================================================================
//                     <!-- END FUNCTION HISTORIQUE   -->
// =======================================================================================================












?>