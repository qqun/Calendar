
    <div class="no-padding">
       <div id="calendar"></div>
    </div>
@section('script')
<script type="text/javascript">
$(function () {

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
        //Random default events
        eventSources: [
        // your event source
        {
        url: '{!!Trans::to('admin/calendar/calendar/ajax/list')!!}', // use the `url` property
        }
        ],
        editable: false,
        droppable: false, // this allows things to be dropped onto the calendar !!!
        resizable: false,
    });
       
});
</script>
@show
@section('style')
<style type="text/css">
    .external-event{
    color: #fff;
    }
    .fc-time{
       display : none;
    }
    .fc-state-active,.fc-state-disabled,.fc-state-hover{
        color: #000 !important;
    }
    .fc-state-default {
        background-color: #12d6cc;
        color: #fff;
        border: none;
    }
</style>
@show
