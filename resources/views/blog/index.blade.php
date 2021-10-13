<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Blogs | Data</title>
</head>
<body style="background: lightgrey">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-light d-flex align-items-center" role="alert">
                        <i class="bi bi-check-circle-fill me-3 fs-4 text-success"></i>
                        <div class="text-success">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-8">
                                <div class="col-sm-12 col-md-8">
                                    <a href="{{ route('blog.create') }}" class="btn btn-md btn-primary">Add New</a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-1">
                                <form class="form-inline float-right" action="{{ url('/blog') }}" method="get">
                                    <div class="dataTables_filter d-flex">
                                        <label class="my-1 mr-2 me-2">Search:</label>
                                        <input type="text" class="form-control form-control-sm" aria-controls="dataTable" name="search" value="{{ Request::get('search') }}">
                                    </div>
                                </form>
                            </div>
                        </div>
                        @forelse ($blogs as $blog)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 text-center">
                                            <img src="images/{{ $blog->image }}" class="rounded" width="150" height="150">
                                        </div>
                                        <div class="col-9">
                                            <b class="text-uppercase">{{ $blog->title }}</b>
                                            <p>{!! $blog->content !!}</p>
                                        </div>
                                        <div class="col-1 align-self-center">
                                            <a href="blog/{{ $blog->id }}" class="btn btn-sm btn-primary rounded-circle">
                                                <i class="bi bi-eye-fill text-white d-block"></i>
                                            </a>
                                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-warning rounded-circle mt-2">
                                                <i class="bi bi-pencil-fill text-white d-block"></i>
                                            </a>
                                            <form onsubmit="return confirm('Apakah anda yakin?');" method="POST" action="blog/{{ $blog->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger rounded-circle mt-2">
                                                    <i class="bi bi-trash d-block"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger mt-3">
                                Data Blog belum tersedia.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="mt-4">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
    <script>
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'Berhasil!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'Gagal!');
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('sweetalert::alert')
</body>
</html> 