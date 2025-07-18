<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /**
     * @return Factory|View|Application|object
     */
    public function index()
    {
        $data = [
            'employees' => Employee::get(),
        ];

        return view('employee.index', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'department' => 'required',
            'salary' => 'required|numeric|min:0',
            'joining_date' => 'required|date',
        ]);

        Employee::create($validated);

        return redirect()->route('employee.list')->with('success', 'Employee saved successfully!');

    }


    /**
     * @param Request $request
     * @return Factory|View|Application|object
     */
    public function list(Request $request)
    {
        $query = Employee::query();

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $from = Carbon::parse($request->from_date)->startOfDay();
            $to = Carbon::parse($request->to_date)->endOfDay();
            $query->whereBetween('joining_date', [$from, $to]);
        }

        $employees = $query->paginate(10)->withQueryString();

        return view('employee.partials.list', compact('employees'));
    }
}
