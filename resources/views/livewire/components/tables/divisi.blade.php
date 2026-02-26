{{-- @section('content') --}}
   <div class="p-6">
        <h1 class="text-xl font-semibold mb-4">Data Divisi</h1>
        <table id="divisi-table" class="display w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($allDivisi as $divisi)
                    <tr>
                        <td>{{$divisi -> id}}</td>
                        <td>{{$divisi -> name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
