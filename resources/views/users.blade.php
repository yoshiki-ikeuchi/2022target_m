<x-library-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ユーザー一覧
        </h2>
    </x-slot>

    <div class="py-12">
    @if(!empty($userdata) && is_array($userdata))
        該当データがありませんでした。
    @else
    <table class="border-separate border border-slate-400">
        <thead>
            <tr>
                <th class="border border-slate-300">ユーザーID</th>
                <th class="border border-slate-300">ユーザー名</th>
                <th class="border border-slate-300">Eメール</th>
                <th class="border border-slate-300">権限</th>
                <th class="border border-slate-300"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userdata as $user)
                <tr>
                    <td class="border border-slate-300">{{ $user->id }}</td>
                    <td class="border border-slate-300">{{ $user->name }}</td>
                    <td class="border border-slate-300">{{ $user->email }}</td>
                    <td class="border border-slate-300">{{ $user->authority == 1 ? '管理者' : '一般' }}</td>
                    <td class="border border-slate-300">
                        <form method="POST" action="{{ route('usersupdate') }}">
                            @csrf
                            <x-dropdown-link :href="route('usersupdate')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                修正
                            </x-dropdown-link>
                            
                            <x-input id="hidden" type="hidden" name="id" value="{{ $user->id }}" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    </div>
</x-library-layout>
