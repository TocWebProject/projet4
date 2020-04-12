// Enregistrement du Mail et Mot de passe de l'administrateur du blog dans localStorage de son navigateur. 

let inputEmailUser = document.getElementById("inputEmail");
let inputPasswordUser = document.getElementById("inputPassword");
let inputCheckbox = document.getElementById("check");
let form = document.getElementById("getForm");


function userLocalSto() {

    form.addEventListener('submit', (e) => {
        e.preventDefault();
    
        if (inputCheckbox.checked === true){
        // Enregistrement du Nom et Prenom dans localStorage.
            let emailStock = inputEmailUser.value;
            let inputPasswordStock = inputPasswordUser.value;
            if (emailStock && inputPasswordStock) {
                localStorage.setItem('mail', emailStock);
                localStorage.setItem('password', inputPasswordStock);
            }    
        }

    });
};


// Récupération des valeurs utilisateurs.
function  getUserMailPasswordForm() {
        inputEmailUser.value = localStorage.getItem('mail');
        inputPasswordUser.value = localStorage.getItem('password');
    }


getUserMailPasswordForm();
userLocalSto();

