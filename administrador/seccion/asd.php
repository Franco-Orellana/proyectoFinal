<?php
    header('Content-Type: application/json');  
    include("../config/db.php");


    $sentenciaSQL = $conexion->prepare("SELECT * FROM visita");
    $sentenciaSQL->execute();
    $listadoDeVisitas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

    $eventos = array();
    foreach($listadoDeVisitas as $visitas) { 
        $eventos[] = array( 
            'title'=> 'El cliente llamado:'." ".$visitas['cliente_visita'].",".' cuyo número de teléfono es:'." ".$visitas['telefono_visita'],
            'start' => $visitas['horario_visita'] == 'Tarde' ? $visitas['fecha_visita']." "."13:00:00": $visitas['fecha_visita']." "."08:00:00",
            'end' => $visitas['horario_visita'] == 'Tarde' ? $visitas['fecha_visita']." "."16:00:00": $visitas['fecha_visita']." "."12:00:00",
            'color' => $visitas['horario_visita'] == 'Tarde' ? '#009846' : '#FF8000',
        );
    }

    echo json_encode($eventos);
?> 

<script src='fullcalendar/core/index.global.js'></script>
    <script src='fullcalendar/core/locales/es.global.js'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'es',
            selectable: true,
            headerToolbar: {
                start: 'timeGridWeek,timeGridDay',
                center: 'title',
                end: 'today prev,next'
            },
            dateClick: function(info) {
                alert('clicked ' + info.dateStr);
            },
            select: function(info) {
                alert('selected ' + info.startStr + ' to ' + info.endStr);
            },
            
            events: 'http://localhost/Proyecto-Inmobiliaria/administrador/seccion/asd.php',
        });
        calendar.render();
        calendar.setOption('locale', 'es');
        event.setAllDay( true )
      });
    </script>