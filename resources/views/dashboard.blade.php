<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="ajax_btn">ajaxtest</div>
                <div class="test_console">test</div>
                <script>
                    window.addEventListener('DOMContentLoaded', function(){
                        $(".ajax_btn").click(
                            function(){
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: 'post',
                                    url: '/ajaxtest',
                                    data: {
                                        'search_name': "投げ返すだけのテスト",
                                    },
                                    dataType: 'json',
                                }).done(function (data){
                                    $(".test_console").text(data.search_name);
                                });
                            }
                        );
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
