@extends('meradriver.app')
@section('title', 'Page Not Found')
@section('content')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

  #error-page {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #007BFF, #00BFFF);
    width: 100%;
    padding: 60px 20px;
    text-align: center;
    color: #fff;
  }

  #error-page img {
    width: 250px;
    margin: 40px 0;
  }

  #error-page h1 {
    font-size: 72px;
    font-weight: 700;
    margin-bottom: 20px;
  }

  #error-page p {
    font-size: 20px;
    margin-bottom: 30px;
  }

  #error-page a.back-button {
    display: inline-block;
    background-color: #ffffff;
    color: #007BFF;
    font-weight: 600;
    text-decoration: none;
    padding: 12px 30px;
    border-radius: 50px;
    font-size: 18px;
    transition: all 0.3s ease;
    box-shadow: 0px 8px 20px rgba(0, 123, 255, 0.3);
  }

  #error-page a.back-button:hover {
    background-color: #e6f0ff;
    box-shadow: 0px 10px 25px rgba(0, 123, 255, 0.4);
    transform: translateY(-5px);
  }
</style>

<div id="error-page">
  <img src="https://cdn-icons-png.flaticon.com/512/2748/2748558.png" alt="404 Error Icon">
  <h1>404</h1>
  <p>Oops! The page you're looking for doesn't exist.</p>
  <a href="{{ url()->previous() }}" class="back-button">← Go Back</a>
</div>
@endsection
