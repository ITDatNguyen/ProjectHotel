<link type="text/css" rel="stylesheet" href="../css/homepage.css" />
    <link rel="stylesheet" type="text/css" href="../layouts/Utilities/Chico-effect.css" />
    <link rel="stylesheet" href="../layouts/Utilities/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <script src="../layouts/Utilities/jQuery-1.x/jquery-1.11.3.min.js"></script>
    <script src="../layouts/Utilities/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="../layouts/Utilities/autocomplete-suggestions/style.css">
    <script type="text/javascript" src="../layouts/Utilities/autocomplete-suggestions/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="../layouts/Utilities/autocomplete-suggestions/locations-autocomplete.js"></script>
    <link href="{{ elixir('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css">
    <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <style>

        header{
            width: 100%;
        }
        body{
            padding-right: 0 !important;
        }
        #left-header{
            float: left;
            margin-left: 20px;
            line-height: 60px;
        }
        #left-header a:hover{
            text-decoration: none;
        }
        #right-header{
            float: right;
            line-height: 60px;
        }
        #right-header a{
            color: black;
        }
        #right-header a:hover{
            text-decoration: none;
        }
        #language{
            cursor: pointer;
        }
        button[type="button"].mybtn-style1{
            border: 0;
        }
        #welcome{
            float: left;
            margin-right: 10px;
            display: none;
        }
        .dropdown-menu a{
            cursor: pointer;
        }
        
        footer{
            background-color: rgb(46,45,45);
            background-image: url('../img/img/footer.png'), url('../img/img/footer.png');
            background-size: 50% 100px;
            background-position: left bottom, right bottom;
            background-repeat: no-repeat;
            clear: both;
            padding-bottom: 150px;
        }
        #left-footer{
            float: left;
            margin-left: 80px;
            margin-top: 30px;
            color: #969595;
        }
        #left-footer a:nth-child(1):hover{
            text-decoration: none;
        }
        #icon-socialnetwork a:hover .fa:before{
            color: rgb(197,196,196);
        }
        #icon-socialnetwork .fa{
            transition-property: all;
            transition-duration: 200ms;
            transition-timing-function: ease;   /* transition-timing-function: ease (default); in: vao dau cham, out: ket thuc cham, linear: toc do nhu* nhau */
            /**/
            -webkit-transition-property: all;
            -webkit-transition-duration: 200ms;
            -moz-transition-property: all;
            -moz-transition-duration: 200ms;
        }
        #icon-socialnetwork a:hover .fa{
            transform: scale(1.2);
            -webkit-transform: scale(1.2);
            -o-transform: scale(1.2);
            -moz-transform: scale(1.2);
        }

        #right-footer{
            float: right;
            margin-top: 15px;
        }
        #right-footer a{
            color: #969595;
        }
        #right-footer a:hover{

        }
        .myTitle{
            font-size: 18px;
            font-weight: bold;
            color: rgb(197,197,197);

        }
    </style>
    <script type="text/javascript" language="javascript">
        $(document).ready(function(){
        var timer;
        var delay = 1000;
        timer = setTimeout(function() {
            if (localStorage.check_login === 'true'){
                $('#welcome').fadeIn(10);
                $('#signup-signin').fadeOut(10);
            } else {
                $('#welcome').fadeOut(10);
                $('#signup-signin').fadeIn(10);
            }
        }, delay);
    });
</script>