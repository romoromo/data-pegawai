<form method="GET" action="{{ route('employees.index') }}">
    <input type="text" name="search" placeholder="Cari pegawai..." value="{{ request('search') }}">
    <button type="submit">Cari</button>
</form>

<table>
    <thead>
        <tr>
            <th><a href="?sort=name&direction={{ request('direction', 'asc') == 'asc' ? 'desc' : 'asc' }}">Nama</a></th>
            <th>Jabatan</th>
            <th>Gaji</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->salary }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $employees->appends(request()->except('page'))->links() }}
