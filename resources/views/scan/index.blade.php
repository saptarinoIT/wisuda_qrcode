<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-center justify-center sm:flex-row  sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Scan QRCode') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-3">
                    <div class="w-full flex justify-center">
                        <div class="w-full sm:w-1/2" id="reader"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <x-slot name="script">
        <script>
            function onScanSuccess(decodedText, decodedResult) {
                let result = decodedText;
                // window.location.href = "update.php?nim=" + result;
                window.location.href = "scan/" + result;
                html5QrcodeScanner.clear();
            }

            function onScanError(errorMessage) {
                console.log(errorMessage);
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                    fps: 10,
                    qrbox: 250
                });
            html5QrcodeScanner.render(onScanSuccess);
        </script>
    </x-slot>
</x-app-layout>
