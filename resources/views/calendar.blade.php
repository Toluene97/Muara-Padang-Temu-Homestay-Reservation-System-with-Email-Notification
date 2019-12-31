<!-- Calendar -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

<div class="panel panel-primary">
        {{-- <h1> huahuahu</h1> --}}
    <div class="c-modal jsModalContainer">
    <div class="panel-body">
        {!! $calendar_details->calendar() !!}
        {!! $calendar_details->script() !!}
    </div>
    </div>
</div>