import './bootstrap';

import Alpine from 'alpinejs';


import Swal from 'sweetalert2';

window.Alpine = Alpine;

Alpine.start();

Livewire.on('alertaBorrarVacante', e =>{
    
    Swal.fire({
        title: '¿Estás Seguro?',
        text: "No vas a poder revertir el borrado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('eliminarVacante', { vacante: e.vacante });
            Swal.fire(
                'Eliminado',
                'La Vacante ha sido Eliminada.',
                'success'
            )
        }
    })
}); 





