<div>

    <div class="max-w-6xl mx-auto mt-4">
        <div>
            <div class="flex justify-center items-center space-x-5 bg-base-300 p-4 rounded-md mb-6">
                <div>
                    <p class="font-normal text-lg">Total</p>
                    <p><span class="font-semibold text-4xl">{{ $total }}</span> Data Mahasiswa</p>
                </div>
                <div>
                    <div id="chart"></div>
                </div>
            </div>
            <div>
                <div>
                    <h1 class="font-semibold text-lg text-center mb-4">Daftar Mahasiswa</h1>
                </div>
                <div class="flex justify-between mb-2">
                    <input wire:model.live.debounce='search' type="text" placeholder="Cari mahasiswa..."
                        class="input input-bordered w-full max-w-xs" />
                    <select wire:model.live.debounce='perpage' class="select select-bordered w-full max-w-20">
                        <option value="2">2</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Gender</th>
                            <th>Usia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->nim }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->birth_date }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->age }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('dataStudent', (data) => {
                var options = {
                    series: data[0],
                    labels: ['Laki-laki', 'Perempuan'],
                    chart: {
                        type: 'pie'
                    },
                }

                var chart = new ApexCharts(document.querySelector("#chart"), options);

                chart.render();
            })
        })
    </script>
@endpush
