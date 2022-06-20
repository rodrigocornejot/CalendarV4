@extends('layouts.app')

@section('scripts')
    
<link href='{{asset('fullcalendar')}}/packages/core/main.css' rel='stylesheet'>
<link href="{{asset('fullcalendar')}}/packages/daygrid/main.css" rel='stylesheet'>
<link href='{{asset('fullcalendar')}}/packages/list/main.css' rel='stylesheet'>
<link href='{{asset('fullcalendar')}}/packages/timegrid/main.css' rel='stylesheet'>

    
    <style>
      html,body{
        margin: 0; padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
      }
      #calendar{ max-width: 1000px; margin: 40px auto;}
    </style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    
<!-- js de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

<!-- Codigo del fullcalendar -->
    <script src="{{asset('fullcalendar')}}/packages/core/main.js"></script>
    <script src='{{asset('fullcalendar')}}/packages/interaction/main.js'></script>
    <script src='{{asset('fullcalendar')}}/packages/daygrid/main.js'></script>

<!-- plugins -->
    <script src='{{asset('fullcalendar')}}/packages/list/main.js'></script>
    <script src='{{asset('fullcalendar')}}/packages/timegrid/main.js'></script>

<!-- funcionalidad y uso de Fullcalendar -->
    <script>

        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
  
          var calendar = new FullCalendar.Calendar(calendarEl, {
            //--definir una fecha para que inicie el calendario--/
            // defaultDate:new Date(2022,5,16),
            plugins: [ 'dayGrid','interaction','timeGrid','list' ],
            //defaultView: 'timeGridDay',

            header:{
              left:'prev,next today Miboton',
              center:'title',
              right:'dayGridMonth,timeGridWeek,timeGridDay'
            },

            customButtons:{
               Miboton:{
                 text:"Boton",
                 click:function(){
                   alert("hola mundo");
                   $('#exampleModal').modal();
                }
             }
          },
          
          dateClick:function(info){
            $('#exampleModal').modal();
            console.log(info);
            calendar.addEvent({ title:"Evento x", date:info.dateStr });
          },

          eventClick:function(info){
            console.log(info);
            console.log(info.event.title);
            console.log(info.event.start);
            console.log(info.event.end);
            console.log(info.event.textColor);
            console.log(info.event.backgroundColor);
            console.log(info.event.extendedProps.descripcion);
          },

          events:[
            {
              title:"Mi evento 1",
              start:"2022-06-18 12:30",
              end:"2022-06-18 14:30",
              descripcion:"descripcion del evento 1",
              textColor:"#000000"
            },
            {
              title:"Mi evento 2",
              start:"2022-06-19 12:30",
              end:"2022-06-20 14:30",
              descripcion:"descripcion del evento 2",
              color:"#FFCCAA",
              textColor:"#000000"
            }
          ]

          });
          
          calendar.setOption('locale','Es');

          calendar.render();
        });
  
      </script>
@endsection

@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
    Launch demo modal
  </button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<div id="calendar"></div>

@endsection