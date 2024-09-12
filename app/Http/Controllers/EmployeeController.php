<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
<script>
    $('form').validate({
        rules: {
            name: "required",
            position: "required",
            salary: {
                required: true,
                number: true,
            },
        },
        messages: {
            name: "Nama wajib diisi",
            position: "Jabatan wajib diisi",
            salary: {
                required: "Gaji wajib diisi",
                number: "Gaji harus berupa angka",
            },
        },
    });
</script>


class EmployeeController extends Controller
{
    public function index(Request $request) {
    // Menampilkan dan mencari data
    $employees = Employee::query();

    if ($request->has('search')) {
        $employees->where('name', 'like', '%' . $request->search . '%');
    }

    // Sorting & filtering
    if ($request->has('sort')) {
        $employees->orderBy($request->sort, $request->get('direction', 'asc'));
    }

    $employees = $employees->paginate(10);
    return view('employees.index', compact('employees'));
	
	return response()->json($employees->get());
}

public function create() {
    return view('employees.create');
}

public function store(Request $request) {
    $request->validate([
        'name' => 'required',
        'position' => 'required',
        'salary' => 'required|numeric',
    ]);

    Employee::create($request->all());

    return redirect()->route('employees.index');
}

}
