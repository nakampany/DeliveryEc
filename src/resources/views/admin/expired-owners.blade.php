<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            削除済みオーナー
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <div class="py-4">
                                <h1>過去に削除したアカウント一覧です。</h1>
                                <h1>本当に必要ないアカウントは完全削除してください。</h1>
                            </div>
                            <x-flash-message status="session('status')" />
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                                            <th class="px-4 py-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メール</th>
                                            <th class="px-4 py-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">削除された日</th>
                                            <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expiredOwners as $owner)
                                        <tr>
                                            <td class="px-4 py-4">{{ $owner->name }}</td>
                                            <td class=" px-4 py-4">{{ $owner->email }}</td>
                                            <td class="px-4 py-4">{{ $owner->deleted_at->diffForHumans() }}</td>
                                            <form id="delete_{{$owner->id}}" method="post" action="{{ route('admin.expired-owners.destroy', ['owner' => $owner->id])}}">
                                                @csrf
                                                <td class="px-4 py-3 text-center">
                                                    <button href="#" data-id="{{ $owner->id }}" onclick="deletePost(this)" class="bg-red-400 border-0 p-2 focus:outline-none hover:bg-red-500 rounded">完全に削除</button>
                                                </td>
                                            </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
