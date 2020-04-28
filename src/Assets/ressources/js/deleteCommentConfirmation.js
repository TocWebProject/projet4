// Confirmation de suppression d'un commentaire
function confirmation(){
    var areYouSure = confirm("Voulez vous vraiment supprimer ce commentaire ?");
    if (areYouSure == true){
        // Oh yes.
        return true;
    }else{
        // No Way. 
        return false;
    }
}