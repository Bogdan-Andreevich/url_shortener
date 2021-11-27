<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Url Shortener') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="GET" action="{route('shortUrl')}">
                  @csrf
                    <div>
                        <form>
                            <div class="form-group">
                                <span>
                                    <input type="text" size="133" class="form-control" id="ShortUrl" placeholder="Enter your url">
                                </span>
                            </div>
                            <button type="submit" class="btn" style="background: #313131; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">Get Short-Url</button>
                          </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
