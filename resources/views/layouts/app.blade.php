
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


  <script src="//code.tidio.co/vfloo94lkmknm9ae0pkkkj5qarlj3wif.js" async></script>


<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/21dca2576a5880368d00c91a1/314610d79f1ea3c934b1191ac.js");</script>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ValueXPA i') }}</title>
     <meta name="description" content="ValueXPA offers Global Outsourcing, Fractional CFO, Analytical Automation, Accounting Services." https://www.valuexpa.com/"/>
     <meta name="keywords" content="ValueXPA offers Global Outsourcing, Fractional CFO, Analytical Automation, Accounting Services " https://www.valuexpa.com/"/>
    <link rel="canonical" href="https://www.valuexpa.com/" />
    <meta content="no-cache" http-equiv="cache-control">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Fonts -->
    <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "iproa7h7n7");
</script>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

     <link href="favicon.png" rel="icon">

</head>
<body> <script>
        window.Laravel = {!!json_encode([
            'isLoggedin' => false
        ])!!}
    </script>
    @if (Auth::check())
    <script>
        window.Laravel = {!!json_encode([
            'isLoggedin' => true,
            'user' => Auth::user()
        ])!!}
    </script>
@else

@endif

    <div id="app">
        @yield('content')
    </div>

<script src="{{ asset('/js/app.js') }}" ></script>



<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S362ZMK740"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-S362ZMK740');
</script>
</body>
</html>
