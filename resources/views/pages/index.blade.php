@extends ('layout.app')

@section('content')
<style>
    /* .container {
      position: relative;
      width: 100%;
      max-width: 400px;
    } */
    
    /* .container img {
      width: 100%;
      height: auto;
    } */
    
    .container .btn {
      position: absolute;
      top: 60%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      background-color: #ffd982;
      color: black;
      font-size: 16px;
      padding: 12px 24px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      text-align: center;
    }
    
    .container .btn:hover {
      background-color: #555;
    }
    </style>
    <div class="jumbotron text-center">
        <h1>Welcome To Muara Padang Temu Homestay</h1>
        
        <div class="container">
            <img src="storage/cover_images/MP Temu cover.jpg" alt="cover image" width="900" height="400" style="border-radius:8px">
            
            <a href="/reservations" class="btn btn-default">Reserve Homestay</a>
          </div>
    </div>
@endsection
