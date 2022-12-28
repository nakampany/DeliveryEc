<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            カート
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($products) > 0)
                    @foreach ($products as $product )
                    <div class="flex items-center justify-center mb-2">
                        <div class="flex items-center justify-center">
                            @if ($product->imageFirst->filename !== null)
                            <img src="{{ asset('storage/products/' . $product->imageFirst->filename )}}" width="300px">
                            @else
                            <img src="">
                            @endif
                        </div>
                        <div class="p-4 flex justify-center items-center">{{ $product->name }}</div>
                        <div class="flex items-center justify-center">
                            <form method="post" action="{{ route('user.cart.delete', [ 'item' => $product->id ]) }}">
                                @csrf
                                <button class="bg-red-400 border-0 p-2 focus:outline-none hover:bg-red-500 rounded">
                                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 20px; height: 20px; opacity: 1;" xml:space="preserve">
                                        <g>
                                            <polygon class="st0" points="339.566,150.861 256,234.436 172.444,150.861 150.87,172.444 234.426,256 150.87,339.556
                                            172.444,361.139 256,277.574 339.566,361.139 361.139,339.566 277.574,256 361.139,172.444 	" style="fill: rgb(75, 75, 75);"></polygon>
                                            <path class="st0" d="M256,0C114.616,0.019,0.018,114.616,0,256c0.018,141.385,114.616,255.982,256,256
                                            c141.393-0.018,255.991-114.615,256-256C511.991,114.616,397.393,0.019,256,0z M417.762,417.762
                                            c-41.44,41.413-98.547,66.995-161.762,66.995c-63.214,0-120.312-25.582-161.762-66.995C52.825,376.313,27.244,319.215,27.244,256
                                            S52.825,135.688,94.238,94.238C135.688,52.825,192.786,27.244,256,27.244c63.215,0,120.322,25.582,161.762,66.994
                                            c41.422,41.45,67.004,98.547,67.004,161.762S459.184,376.313,417.762,417.762z" style="fill: rgb(75, 75, 75);"></path>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="p-4 flex justify-around items-center" style="letter-spacing: 1px;">
                        <div>{{ $product->pivot->quantity }}個</div>
                        <div>{{ number_format($product->pivot->quantity * $product->price )}}<span class="text-sm text-gray-700">円(税込)</span></div>
                    </div>

                    @endforeach
                    <hr class="py-4">
                    <div class="flex justify-around items-center" style="letter-spacing: 1px;">
                        <div> デリバリー配送料： </div>
                        <div> 500 <span class="text-sm text-gray-700">円(税込)</span> </div>
                    </div>
                    <hr class="py-4">
                    <div class="flex justify-around items-center" style="letter-spacing: 1px; margin: 30px 0 70px;">
                        <div> 合計：</div>
                        <div> {{ number_format($totalPrice) }} <span class="text-sm text-gray-700">円(税込)</span> </div>
                    </div>
                    </p>
                    <div class="mx-auto max-w-xl">
                        <div>
                            <button onclick="location.href='{{ route('user.cart.checkout') }}'" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">購入する
                            </button>
                        </div>
                        @else
                        カートに商品が入っていません。
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>