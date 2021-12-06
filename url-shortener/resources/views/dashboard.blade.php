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
        <p>
            <strong>
                The new url: <a href="{{session()->get('success')}}">{{session()->get('success')}}</a>
            </strong>
        </p>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="customForm" method="POST" action="{{route('CreateShortUrl')}}">
                  @csrf
                    <div>
                            <div class="form-group">
                                <span>
                                    <input type="text" name="url" size="133" class="form-control customFormInput" id="short-url" placeholder="Enter your url">
                                </span>
                            </div>
                            <button type="submit" class="btn" style="background: #313131; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">Get Short-Url</button>
                    </div>
                </form>

                {{-- <script>
                    const form = document.querySelector('.customForm');
                    const formInput = document.querySelector('.customFormInput');
                    form.addEventListener('submit', (e) => {

                        fetch(`dashboard/${formInput.value}`)
                            .then(json => json.json())
                            .then(res => alert(res.name));

                        e.preventDefault();
                    });
                </script> --}}
            </div>
        </div>
    </div>
</x-app-layout>
