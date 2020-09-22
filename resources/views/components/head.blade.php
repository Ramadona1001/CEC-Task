<head>
    <meta charset="UTF-8">
    <title>CEC</title>
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link href = "{{ asset('assets/jquery-ui.css') }}" rel = "stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .ui-overlay-a, .ui-page-theme-a, .ui-page-theme-a .ui-panel-wrapper{
            text-shadow: none;
        }

        .button.ui-btn, .ui-controlgroup-controls button.ui-btn-icon-notext{
            width: auto;
        }
        
        #loading
        {
            text-align:center; 
            background: url('{{ asset("assets/loader.gif") }}') no-repeat center; 
            height: 150px;
        }
    </style>
  </head>