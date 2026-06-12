const obtenerColor = (nombre) => getComputedStyle(document.documentElement)
    .getPropertyValue(nombre)
    .trim();

const coloresAlerta = {
    success: obtenerColor('--color-terciario'),
    error: obtenerColor('--color-negro'),
    warning: obtenerColor('--color-secundario'),
    info: obtenerColor('--color-secundario'),
    question: obtenerColor('--color-secundario')
};

if (typeof window.Swal !== 'undefined') {
    const swalConMarca = window.Swal.mixin({
        background: obtenerColor('--color-blanco'),
        color: obtenerColor('--color-secundario'),
        buttonsStyling: false,
        customClass: {
            confirmButton: 'btn-alerta-confirmar',
            cancelButton: 'btn-alerta-cancelar',
            denyButton: 'btn-alerta-denegar'
        }
    });
    const mostrarAlerta = swalConMarca.fire.bind(swalConMarca);

    swalConMarca.fire = (opciones, ...argumentos) => {
        if (typeof opciones === 'object' && opciones !== null) {
            opciones = {
                ...opciones,
                iconColor: opciones.iconColor || coloresAlerta[opciones.icon]
            };
        } else if (typeof opciones === 'string' && argumentos[1]) {
            opciones = {
                title: opciones,
                html: argumentos[0],
                icon: argumentos[1],
                iconColor: coloresAlerta[argumentos[1]]
            };
            argumentos = [];
        }

        return mostrarAlerta(opciones, ...argumentos);
    };

    window.Swal = swalConMarca;
}

function confirmarAccion(url) {
    window.Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede revertir.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((resultado) => {
        if (resultado.isConfirmed) {
            window.location.href = url;
        }
    });
}
