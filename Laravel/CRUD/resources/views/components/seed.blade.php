<form action="{{route('seed')}}" method="post" class="d-inline-block">
    @csrf
    <button type="submit" class="btn btn-primary mb-3">
        Seed
    </button>
</form>
