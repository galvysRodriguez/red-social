function publicar(){

    const publicarModal = document.getElementById('publicarFondo')

    if(publicarModal.style.display === "none"){

        publicarModal.style.display = "flex"

    }else{

        publicarModal.style.display = "none"

    }
}