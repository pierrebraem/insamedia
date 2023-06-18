'use-strict';

const boutonFiltre = document.getElementById('rechercheFiltre');
if(boutonFiltre !== null){
    boutonFiltre.addEventListener('click', () =>{
        let modal = document.getElementById('modalFiltre');
        let fermer = document.getElementsByClassName('fermer')[0];
    
        modal.style.display = 'block';
    
        fermer.onclick = () => {
            modal.style.display = 'none';
        }
    });
}

const boutonModeration = document.getElementById('ouvrirModalModeration');
if(boutonModeration !== null){
    boutonModeration.addEventListener('click', () =>{
        let modal = document.getElementById('modalModeration');
        let fermer = document.getElementsByClassName('fermer')[0];
        let fermerB = document.getElementsByClassName('fermerB')[0];

        modal.style.display = 'block';

        fermer.onclick = () => {
            modal.style.display = 'none';
        }

        fermerB.onclick = () => {
            modal.style.display = 'none';
        }
    });
}

const boutonBanni = document.getElementById('ouvrirModalBannir');
if(boutonBanni !== null){
    boutonBanni.addEventListener('click', () =>{
        let modal = document.getElementById('modalBannir');
        let fermer = document.getElementsByClassName('fermer')[1];
        let fermerB = document.getElementsByClassName('fermerB')[1];

        modal.style.display = 'block';

        fermer.onclick = () => {
            modal.style.display = 'none';
        }

        fermerB.onclick = () => {
            modal.style.display = 'none';
        }
    });
}

const boutonSupprimerAdmin = document.getElementsByClassName('ouvrirModalSuppressionAdmin');
if(boutonSupprimerAdmin !== null){
    for(let i=0; i < boutonSupprimerAdmin.length; i++){
        boutonSupprimerAdmin[i].addEventListener('click', () => {
            let idBannissement = boutonSupprimerAdmin[i].getAttribute('data-id');
            let modal = document.getElementById('modalSuppressionAdmin');
            let fermer = document.getElementsByClassName('fermer')[2];
            let fermerB = document.getElementsByClassName('fermerB')[2];
    
            modal.style.display = 'block';

            let btnSupprimerAdmin = document.getElementsByClassName('btn-suppression-admin')[0];
            btnSupprimerAdmin.setAttribute('href', '/banni/'+ idBannissement + '/supprimer');
    
            fermer.onclick = () => {
                modal.style.display = 'none';
            }
    
            fermerB.onclick = () => {
                modal.style.display = 'none';
            }
        });
    }
}

const boutonModificationProfilAdmin = document.getElementById('ouvrirModalModificationProfilAdmin');
if(boutonModificationProfilAdmin !== null){
    boutonModificationProfilAdmin.addEventListener('click', () =>  {
        let modal = document.getElementById('modalModicationProfilAdmin');
        let fermer = document.getElementsByClassName('fermer')[3];
        let fermerB = document.getElementsByClassName('fermerB')[3];

        modal.style.display = 'block';

        fermer.onclick = () => {
            modal.style.display = 'none';
        }

        fermerB.onclick = () => {
            modal.style.display = 'none';
        }
    });
}

const boutonSignalement = document.getElementsByClassName('ouvrirModalSignalement');
if(boutonSignalement !== null){
    for(let i=0; i<boutonSignalement.length; i++){
        boutonSignalement[i].addEventListener('click', () => {
            let idPublication = boutonSignalement[i].getAttribute('data-id');
            let modal = document.getElementById('modalSignalement');
            let fermer = document.getElementsByClassName('fermer')[0];
            let fermerB = document.getElementsByClassName('fermerB')[0];
    
            modal.style.display = 'block';

            let btnSignalement = document.getElementsByClassName('form-signalement')[0];
            btnSignalement.setAttribute('action', '/administrateur/signalements/'+ idPublication + '/ajouter');
    
            fermer.onclick = () => {
                modal.style.display = 'none';
            }
    
            fermerB.onclick = () => {
                modal.style.display = 'none';
            }
        });
    }
}