const buttonFiltre = document.getElementById('rechercheFiltre')
buttonFiltre.addEventListener('click', () =>{
    var modal = document.getElementById('modalFiltre');
    var fermer = document.getElementsByClassName('fermer')[0];

    modal.style.display = "block";

    fermer.onclick = () => {
        modal.style.display = "none";
    }
})