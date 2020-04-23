// Confirmation de suppression d'article 
function confirmation(){
    var areYouSure = confirm("Voulez vous vraiment supprimer cet article ?");
    if (areYouSure == true){
        // Oh yes.
        return true;
    }else{
        // No Way. 
        return false;
    }
}