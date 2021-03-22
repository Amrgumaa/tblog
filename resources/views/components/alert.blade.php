<div class="ml-5">
    @foreach ($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
    @endforeach
</div>
