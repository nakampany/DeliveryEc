<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オーナー一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <x-flash-message status="session('status')" />
                            <div class="flex justify-end mb-4">
                                <button onclick="location.href='{{ route('admin.owners.create') }}'" class="bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">新規登録</button>
                            </div>
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                                            <th class="px-4 py-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メール</th>
                                            <th class="px-4 py-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th>
                                            <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                            <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($owners as $owner)
                                        <tr>
                                            <td class="px-4 py-4">{{ $owner->name }}</td>
                                            <td class=" px-4 py-4">{{ $owner->email }}</td>
                                            <td class="px-4 py-4">{{ $owner->created_at->diffForHumans() }}</td>
                                            <td class="w-10 text-center">
                                                <button type="submit" onclick=" location.href='{{ route('admin.owners.edit', ['owner' => $owner->id]) }}'" class="bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">編集</button>
                                            </td>
                                            <td class="w-10 text-center">
                                                <form method="post" id="delete_{{$owner->id}}" action="{{ route('admin.owners.destroy', ['owner' => $owner->id])}}">
                                                    @csrf
                                                    @method('delete')
                                                    <a data-id="{{ $owner->id }}" onclick="deletePost(this)">削除</a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $owners->links() }}
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
