<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f7f7f7;
    }

    h2 {
      margin-top: 0;
    }

    p {
    margin: 0;
    padding: 0;
  }

  a {
    color: blue;
    text-decoration: none;
    font-weight: bold;
  }

  a:hover {
    text-decoration: underline;
  }

    form {
      margin-bottom: 10px;
    }

    button {
      padding: 10px 20px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    input[type="text"],
    input[type="password"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    .container {
      border: 3px solid black;
      padding: 20px;
      margin-bottom: 20px;
    }

    .post {
      background-color: #fff;
      padding: 10px;
      margin: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
  </style>
</head>
<body>

  @auth
  <p>Congrats you are logged in.</p>
  <form action="/logout" method="POST">
    @csrf
    <button>Log out</button>
  </form>

  <div class="container">
    <h2>Create a New Post</h2>
    <form action="/create-post" method="POST">
      @csrf
      <input type="text" name="title" placeholder="Post Title">
      <textarea name="body" placeholder="Body Content..."></textarea>
      <button>Save Post</button>
    </form>
  </div>

  <div class="container">
    <h2>All Posts</h2>
    @foreach($posts as $post)
    <div class="post">
      <h3>{{$post['title']}} by {{$post->user->name}}</h3>
      {{$post['body']}}
      <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
      <form action="/delete-post/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete</button>
      </form>
    </div>
    @endforeach
  </div>

  @else
  <div class="container">
    <h2>Register</h2>
    <form action="/register" method="POST">
      @csrf
      <input name="name" type="text" placeholder="Name">
      <input name="email" type="text" placeholder="Email">
      <input name="password" type="password" placeholder="Password">
      <button>Register</button>
    </form>
  </div>
  <div class="container">
    <h2>Login</h2>
    <form action="/login" method="POST">
      @csrf
      <input name="loginname" type="text" placeholder="Name">
      <input name="loginpassword" type="password" placeholder="Password">
      <button>Log in</button>
    </form>
  </div>
  @endauth

</body>
</html>
