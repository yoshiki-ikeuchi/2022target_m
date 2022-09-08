<x-library-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ユーザー更新
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('usersupdateexec') }}">
            @csrf
            <x-input id="hidden" type="hidden" name="id" value="{{ $userdata->id }}" />
            <div>
                名前：<x-input id="name" type="text" name="name" value="{{ $userdata->name }}" />
            </div>
            <div>
                パスワード：<x-input id="password" type="password" name="password" value="" />
                <br>
                ※変更したいときのみ入力
            </div>
            <div>
                管理者権限<input id="authority" type="checkbox" name="authority" {{$userdata->authority == 1 ? "checked" : ""}} />
            </div>
            
            <x-dropdown-link :href="route('usersupdateexec')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                更新
            </x-dropdown-link>
        </form>
    </div>
</x-library-layout>
