@component('mail::message')
    # Hello {{ $demo->receiver_name }},

    @php echo("\r Your 2 Factor code is: ")@endphp {{ $demo->message . " \r \n" }}

    @php echo("\r Thanks! \r\n") @endphp

    @php echo("\r Kind regards \r \n") @endphp,
    {{ "\r " . $demo->sender }} @php echo("your reputable financial broker. \r\n") @endphp

@endcomponent
