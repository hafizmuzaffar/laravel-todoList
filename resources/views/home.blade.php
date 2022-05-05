<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css">
    <script rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</head>

<body class="bg-info">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To Do List</h3>
                <form action="{{ route('store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form>
                {{-- if task count --}}
                @if (count($todolists))
                    <ul class="list-group list-group-flush mt-3">
                        @foreach ($todolists as $item)
                            <li class="list-group-item">
                                <form action="{{ route('destroy', $item->id) }}" method="post">
                                    {{ $item->content }}
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-link btn-sm float-end"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="alert alert-warning">
                        <strong>No task</strong>
                @endif
            </div>
            @if (count($todolists))
                <div class="card-footer">
                    <div class="float-right">
                        You Have {{ count($todolists) }} Task
                    </div>
            @endif
        </div>
    </div>
</body>

</html>
