@php $locale = session()->get('locale'); @endphp
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        @switch($locale)
            @case('en')
            <img src="{{asset('images/flag/uk.png')}}">
            @break
            @case('fr')
            <img src="{{asset('images/flag/fr.png')}}">
            @break
            @case('es')
            <img src="{{asset('images/flag/es.png')}}">
            @break
            @case('pt')
            <img src="{{asset('images/flag/pt.png')}}">
            @break
            @case('it')
            <img src="{{asset('images/flag/it.png')}}">
            @break
            @case('ja')
            <img src="{{asset('images/flag/ja.png')}}">
            @break
            @case('nl')
            <img src="{{asset('images/flag/nl.png')}}">
            @break
            @case('pl')
            <img src="{{asset('images/flag/pl.png')}}">
            @break
            @case('de')
            <img src="{{asset('images/flag/de.png')}}">
            @break
            @case('ru')
            <img src="{{asset('images/flag/ru.png')}}">
            @break
            @case('tr')
            <img src="{{asset('images/flag/tr.png')}}">
            @break
            @default
            <img src="{{asset('images/flag/uk.png')}}">
        @endswitch
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="/lang/en"><img class="flag-icon" src="{{asset('images/flag/uk.png')}}"> {{__('customer_msg.English')}}</a>
        <a class="dropdown-item" href="/lang/fr"><img class="flag-icon" src="{{asset('images/flag/fr.png')}}"> {{__('customer_msg.French')}} </a>
        <a class="dropdown-item" href="/lang/es"><img class="flag-icon" src="{{asset('images/flag/es.png')}}"> {{__('customer_msg.Spanish')}} </a>
        <a class="dropdown-item" href="/lang/pt"><img class="flag-icon" src="{{asset('images/flag/pt.png')}}"> {{__('customer_msg.Portuguese')}} </a>
        <a class="dropdown-item" href="/lang/it"><img class="flag-icon" src="{{asset('images/flag/it.png')}}"> {{__('customer_msg.Italian')}} </a>
        <a class="dropdown-item" href="/lang/ja"><img class="flag-icon" src="{{asset('images/flag/ja.png')}}"> {{__('customer_msg.Japanese')}} </a>
        <a class="dropdown-item" href="/lang/nl"><img class="flag-icon" src="{{asset('images/flag/nl.png')}}"> {{__('customer_msg.Dutch')}} </a>
        <a class="dropdown-item" href="/lang/pl"><img class="flag-icon" src="{{asset('images/flag/pl.png')}}"> {{__('customer_msg.Polish')}} </a>
        <a class="dropdown-item" href="/lang/de"><img class="flag-icon" src="{{asset('images/flag/de.png')}}"> {{__('customer_msg.German')}} </a>
        <a class="dropdown-item" href="/lang/ru"><img class="flag-icon" src="{{asset('images/flag/ru.png')}}"> {{__('customer_msg.Russian')}} </a>
        <a class="dropdown-item" href="/lang/tr"><img class="flag-icon" src="{{asset('images/flag/tr.png')}}"> {{__('customer_msg.Turkish')}} </a>
    </div>
</li>

