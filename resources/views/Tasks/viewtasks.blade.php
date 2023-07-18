<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User Tasks</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>                                                                                                                                                                                                                                                                                                                                      
        <div class="container" style="margin-top:20px;">
        <div class="row">

        <div class="col-md-12">
            <h2>User Tasks</h2>

            <div style="float:right">
                <a href="{{url('addtasks')}}" class="btn btn-success">Add Task</a>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif
<table class="table">
  <thead class="thead-light">
    <tr>
    <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Due Date</th>
      
    </tr>
  </thead>
  <tbody>

  @php

    $i = 1;

  @endphp

  @foreach ($tasks as $task)
    <tr>
      
      <td>{{$i++}}</td>
      <td>{{$task->title}}</td>
      <td>{{$task->description}}</td>
      <td>{{$task->due_date}}</td>
    
      
       
    </tr>
    @endforeach
    
  </tbody>
</table>

        </div>
        </div>


        </div>
    
    </body>
</html>