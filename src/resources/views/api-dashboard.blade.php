<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('API Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto sm:max-w-7xl px-6">
        <div class="flex flex-wrap -mx-3 overflow-hidden py-6 ">

            <div class="my-1 w-full  px-3 pb-12 lg:w-1/2 overflow-hidden">
                <div class="shadow-xl sm:rounded-lg bg-white h-full  sm:pt-6">
                    <h3 class="font-black text-2xl text-center">Number of API Requests</h3>
                    <div class="text-center flex h-full">
                        <div class="m-auto">
                            @if($logSummary)
                                <span class="font-black text-6xl align-middle inline-block">{{ $logSummary->summary['total'] }}</span>
                            @else
                                <span class="font-black text-sm align-middle inline-block">No data</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <div class="my-1 w-full px-3 pb-12 lg:w-1/2 overflow-hidden">
                <div class="shadow-xl sm:rounded-lg bg-white px-6 py-6">
                    <h3 class="font-black text-2xl text-center mb-5">Top API End points</h3>
                    <div id="piechart" style="height: 200px;"></div>

                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                                ['Endpoints', 'Calls'],
                                @php
                                    if($logSummary)
                                    {
                                        foreach($logSummary->summary['endpointCount'] as $name => $calls) {
                                            echo "['".$name."', ".$calls."],", PHP_EOL;
                                        }
                                    }
                                @endphp
                            ]);

                            var options = {
                                title: '',
                                is3D: false,
                                legend: 'none',
                                pieSliceText: 'label',
                                chartArea: { height: '100%' }
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                        }
                    </script>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 overflow-hidden py-6 ">
            <div class="my-1 w-full  px-3 pb-12 overflow-hidden">
                <div class="shadow-xl sm:rounded-lg bg-white h-full p-5">
                    <table class="border-collapse table-auto w-full bg-white table-striped">
                        <thead>
                        <tr class="text-left">
                            <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider text-s w-1/5">Date</th>
                            <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider text-s w-1/3">Endpoint</th>
                            <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider text-s w-1/6">Status</th>
                            <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider text-s w-1/2">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td class="border-t border-gray-200">
                                    <span class="text-gray-700 px-6 py-3 flex items-center">
                                        {{ $log->datetime }}
                                    </span>
                                </td>
                                <td class="border-t border-gray-200">
                                    <span class="text-gray-700 px-6 py-3 flex items-center">
                                        {{ $log->context['endpoint'] }}
                                    </span>
                                </td>
                                <td class="border-t border-gray-200">
                                    <span class="text-gray-700 px-6 py-3 flex items-center">
                                        {{ $log->context['status'] }}
                                    </span>
                                </td>
                                <td class="border-t border-gray-200">
                                    <span class="text-gray-700 px-6 py-3 flex items-center">
                                        {{ $log->context['description'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        @if($logs->count() == 0)
                            <tr>
                                <td class="border-t border-gray-200 text-center" colspan="4">
                                    <p class="text-gray-700 px-6 py-3 items-center text-center">
                                        No logs available
                                    </p>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
