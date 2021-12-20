<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Url Shortener') }}
        </h2>
    </x-slot>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session()->has('success'))

    <div id="myModalMessage" class="modal modal-message">
        <div class="modal-content">
            <span class="close_message">×</span>

            <p>
                <strong>
                    The new url: <a href="{{session()->get('success')}}">{{session()->get('success')}}</a>
                </strong>
            </p>

          </div>
    </div>

    @endif
    <div class="py-12">
        <style>

            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            .close, .close_message {
                position: absolute;
                top: 25px;
                right: 25px;
            }

            .input_group {
                display: flex;
                flex-direction: column;
            }

            .input_group input {
                margin-bottom: 25px;
            }

            .input_group h2 {
                margin-bottom: 5px;
                font-size: 18px;
                font-weight: 500;
            }

            .input_group input:last-child {
                margin-bottom: 25px;
            }

            .primaryInput {
                width: 100%;
            }

            .modal-content {
                position: relative;
                background-color: rgb(231, 228, 231);
                margin: auto;
                padding: 25px;

                border: 5px solid #6b6b6b;
                width: 50%;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.4s;
                animation-name: animatetop;
                animation-duration: 0.4s
            }


            @-webkit-keyframes animatetop {
                from {top:-300px; opacity:0}
                to {top:0; opacity:1}
            }

            @keyframes animatetop {
                from {top:-300px; opacity:0}
                to {top:0; opacity:1}
            }

        </style>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button id="myBtn" class="btn" style="background: #313131; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">Get short url</button>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">×</span>

                    <form class="customForm" method="POST" action="{{route('CreateShortUrl')}}">
                        @csrf
                          <div>
                                  <div class="form-group">
                                      <span class="input_group">
                                          <label>
                                            <h2>Enter your url:</h2>
                                            <input type="text" pattern='(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})' name="url" required class="form-control customFormInput primaryInput" id="short-url" placeholder="Enter your url">
                                          </label>

                                          <label>
                                            <h2>Alias for the link (optional):</h2>
                                            <input type="text" name="nameForShortUrl" maxLength='20' class="form-control customFormInput" id="short-url" placeholder="Enter your name for url">
                                          </label>
                                      </span>
                                  </div>
                                  <button type="submit" class="btn" style="background: #313131; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">Get Short-Url</button>
                          </div>
                      </form>

                  </div>
            </div>


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <script>
                    var modal = document.getElementById('myModal');

                    var btn = document.getElementById("myBtn");

                    var span = document.getElementsByClassName("close")[0];

                    var message = document.querySelector('.modal-message');

                    if (message) {
                        message.style.display = "block";

                        message.querySelector('.close_message').onclick = function() {
                            message.style.display = "none";
                        };

                    }


                    btn.onclick = function() {
                        modal.style.display = "block";
                    }


                    span.onclick = function() {
                        modal.style.display = "none";
                    }


                    window.onclick = function(event) {
                        if (event.target == modal || event.target == message) {
                            modal.style.display = "none";
                            message.style.display = 'none';
                        }
                    }
                </script>

            </div>
        </div>
    </div>
</x-app-layout>
