@extends("layouts.nav-links")
@section("mainStyle")
<style>
    body{
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url({{ asset('Images/Main-Background.jpg') }});
        background-size: cover;
    }
    .split-text-container {
        display: flex;
        font-size: 5rem;
        font-weight: bold;
        text-transform: uppercase;
        color: #fff;
        overflow: hidden;
        margin-left: 39%;
        margin-top: 10%;
    }

    .text-part {
        display: inline-block;
        position: relative;
        transform: translateX(0);
        animation-duration: 2s;
        animation-timing-function: ease-out;
        animation-fill-mode: forwards;
    }

    .text-part.left {
        transform: translateX(-200%);
        animation-name: slide-in-left;
        font-family: Satisfy;
    }

    .text-part.right {
        transform: translateX(200%);
        animation-name: slide-in-right;
        font-family: Satisfy;
    }

    @keyframes slide-in-left {
        0% {
            transform: translateX(-200%);
        }
        100% {
            transform: translateX(0);
        }
    }

    @keyframes slide-in-right {
        0% {
            transform: translateX(200%);
        }
        100% {
            transform: translateX(0);
        }
    }
</style>
@endsection
@section("main")
    <div class="split-text-container">
        <span class="text-part left">Wel</span>
        <span class="text-part right">come to</span>
    </div>
    <h1 style="color: #e3e3e0; font-family: WorkSans; margin-left: 40%; font-size: xxx-large">My Restaurant</h1>
    <a href="{{route('order')}}" style="color: #ff4433; font-size: larger; margin-left: 48%; text-decoration: none; outline: none;">order food</a>
@endsection