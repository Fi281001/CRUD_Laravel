<!doctype html>
<html lang="en">
  <head>
    <!-- Thẻ meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD Laravel-Edit</title>
    <style>
      body {
        background-color: #f8f9fa;
      }
      .form-container {
        max-width: 500px;
        margin: 30px auto;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
      }
      .page-title {
        text-align: center;
        margin-bottom: 30px;
        color: #343a40;
      }
    </style>
  </head>
  <body>
    <section class="container">
      <div class="form-container">
        <div class="card p-4">
          <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data"
          enctype="muiltipart/form-data">
            @csrf
            @method('PUT')
            <h2 class="text-center mb-4">EDIT POST</h2>
            
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
              @error('title')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="image" class="form-label">Image</label>
              <input type="file" class="form-control mb-3" id="image" name="image">
              <img style="width:100px; heigth:100px;" src="{{ asset("images/".$post->image) }}"/>
              @error('image')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="body" class="form-label">Content</label>
              <textarea class="form-control" id="body" name="body" rows="10">{{ $post->body }}</textarea>
              @error('body')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="submit" class="btn btn-primary me-md-2">Save Edit</button>
              <a href="{{ route('post.create') }}" class="btn btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>