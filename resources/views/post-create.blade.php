<!doctype html>
<html lang="en">
  <head>
    <!-- Thẻ meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD Laravel</title>
  </head>
  <body>
    <section>
        <div class="container py-5">
          <div class="row">
            <div class="col-md-5">
               @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ 'Tạo thành công' }}
                    </div>
                @endif
                 @if (session()->has('success_delete'))
                    <div class="alert alert-success">
                        {{ 'Xóa thành công' }}
                    </div>
                @endif
              <div class="card p-3">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <h2>ADD POST</h2>
                  <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="" name="title" value="{{ old('title') }}" >
                    @error('title')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label for="title" class="form-label">Image</label>
                      <input type="file" class="form-control" id="" name="image" >
                      @error('image')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                   <div class="mb-3">
                      <label for="" class="">Content</label>
                      <textarea class="form-control" id="" name="body" rows="10">{{ old('body') }}</textarea>
                      @error('body')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form> <!-- Thẻ đóng này bị thiếu -->
              </div>
            </div>
            <div class="col-md-7">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                    <th scope="row">{{$post->id }}</th>
                    <td>{{$post->title }}</td>
                    <td>{{$post->body}}</td>
                    <td><img style="width:100px" src="{{ asset('images/'.$post->image) }}" alt=""/></td>
                    <td>
                        <a href="{{ route('post.edit',$post->id) }}" class="btn btn-warning">Edit</a>
                     </td>
                    <td>
                     <form action="{{ route('post.destroy', $post->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </section>
  </body>
</html>