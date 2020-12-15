{{-- Show the inputs --}}
@php
    // dd($fields);
@endphp
@foreach ($fields as $field)
    <!-- load the view from type and view_namespace attribute if set -->
    @php
        $fieldsViewNamespace = $field['view_namespace'] ?? 'crud::fields';
    @endphp

    @include($fieldsViewNamespace.'.'.$field['type'], ['field' => $field])
@endforeach

