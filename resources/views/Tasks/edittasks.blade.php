<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    </head>
    <body>

    <div class="container" style="margin-top:20px;">
        <div class="row">

        <div class="col-md-12">
            <h2>Edit Task</h2>

            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif

   <form method="post" action="{{url('updatetask')}}">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
   <div class="form-group">
    <label for="">Title</label>
    <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$data->title}}">
    @error('title')
    <div class="alert alert-danger" role="alert">
    {{$message}}
            </div>
     @enderror       
  </div>

  <div class="form-group">
    <label for="">Description</label>
    <textarea name="description" class="form-control" placeholder="Enter description">{{$data->description}}</textarea>
@error('description')
<div class="alert alert-danger" role="alert">
    {{$message}}
</div>
@enderror
 
  </div>
  <div class="form-group">
    <label for="">Due Date</label>
    <input type="date" name="due_date" class="form-control" placeholder="Due Date" value="{{$data->due_date}}">
    @error('due_date')
    <div class="alert alert-danger" role="alert">
    {{$message}}
            </div>
     @enderror 
  </div>
 
  <br>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{url('tasks')}}" class="btn btn-danger"> Back</a>
</form>

        </div>
        </div>
        </div>
    
    </body>
</html>