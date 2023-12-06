
const dataInteracciones = {
    labels: ['Publicación 1', 'Publicación 2', 'Publicación 3', 'Publicación 4'],
    datasets: [{
        label: 'Me gusta',
        data: '2',// Ejemplo de datos de Me gusta
        backgroundColor: '#94ADD1',
    }, {
        label: 'Guardados',
        data: [10, 25, 15, 30], // Ejemplo de datos de Comentarios
        backgroundColor: '#4A576B',
    }]
};

new Chart(
    document.getElementById('interaccionesChart'),
    {
        type: 'bar',
        data: dataInteracciones,
        options: {
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true,
                }
            },
            responsive: true, // Hace que el gráfico sea responsive
            maintainAspectRatio: false, // Permite ajustar el aspecto del gráfico en el contenedor
            title: {
                display: true,
                text: 'Interacciones en tus publicaciones'
            },
            legend: {
                display: true,
                position: 'top', // Puedes cambiar la posición (top, bottom, left, right)
            },
            animation: {
                duration: 2000, // Duración de la animación en milisegundos
                easing: 'easeInOutQuart' // Tipo de easing (puedes probar diferentes)
            }
          
        }
    }
);

const dataActividadDiaria = {
    labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
    datasets: [{
        label: 'Publicaciones Diarias',
        data: [25, 40, 30, 35, 20, 45, 50], // Ejemplo de datos de actividad diaria
        borderColor: '#94ADD1',
        fill: false,
    },{
        label: 'Historias Diarias',
        data: [25, 10, 0, 35, 20, 45, 10], // Ejemplo de datos de actividad diaria
        borderColor: '#4A576B',
        fill: false,}]
};
const dataEdades = {
    labels: ['18-24', '25-34', '35-44', '45-54', '55 o más'],
    datasets: [{
        data: [15, 30, 20, 15, 12], // Ejemplo de datos de distribución de edades
        backgroundColor: ['#323438', '#94ADD1', '#4A576B', '#82B4FF', '#4F95FF'],
    }]
};

new Chart(
    document.getElementById('edadChart'),
    {
        type: 'doughnut',
        data: dataEdades,
        options: {
            responsive: true, // Hace que el gráfico sea responsive
            maintainAspectRatio: false, // Permite ajustar el aspecto del gráfico en el contenedor
            title: {
                display: true,
                text: 'Edades de tus seguidores'
            },
            legend: {
                display: true,
                position: 'top', // Puedes cambiar la posición (top, bottom, left, right)
            },
            scales: {
                xAxes: [{
                    type: 'time', // Para gráficos de línea con escalas de tiempo
                    time: {
                        unit: 'day'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            animation: {
                duration: 2000, // Duración de la animación en milisegundos
                easing: 'easeInOutQuart' // Tipo de easing (puedes probar diferentes)
            }
            // ... más configuraciones
        }
    }
);
new Chart(
    document.getElementById('actividadDiariaChart'),
    {
        type: 'line',
        data: dataActividadDiaria,
        options: {
            responsive: true, // Hace que el gráfico sea responsive
            maintainAspectRatio: false, // Permite ajustar el aspecto del gráfico en el contenedor
            title: {
                display: true,
                text: 'Edades de tus seguidores'
            },
            legend: {
                display: true,
                position: 'top', // Puedes cambiar la posición (top, bottom, left, right)
            },
            scales: {
                xAxes: [{
                    type: 'time', // Para gráficos de línea con escalas de tiempo
                    time: {
                        unit: 'day'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            animation: {
                duration: 2000, // Duración de la animación en milisegundos
                easing: 'easeInOutQuart' // Tipo de easing (puedes probar diferentes)
            }
            // ... más configuraciones
        }
    }
);

