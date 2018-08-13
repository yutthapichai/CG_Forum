@if(count($errors) > 0)
    <ul class="list-group mt-3">
        @foreach($errors->all() as $error)
            <li class="list-group-item text-danger list-group-item-danger">
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif
