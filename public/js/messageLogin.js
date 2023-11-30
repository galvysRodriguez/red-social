function mensajeAlertaIniciado(mensaje){Swal.fire({
    title: 'No has iniciado sesión',
    text: "Para darle " + mensaje + " debes haberte iniciado",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iniciar sesión'
  }).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "/login"
    }
  })}