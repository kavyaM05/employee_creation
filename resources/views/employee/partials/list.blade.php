<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!--  jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJ+Y7RyKcG8z+q2cVQzkw5NvR0iLDDq+0i/Rg="
        crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="form-group row" style="margin: 10px;">
    <form method="GET" action="{{ route('employee.list') }}" class="form-inline mb-3">
        <div class="form-group mr-2">
            <select class="form-control" name="department">
                <option value="">Select Department</option>
                @foreach(['HR', 'Sales', 'Tech', 'Marketing'] as $dept)
                    <option value="{{ $dept }}">{{ $dept }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mr-2">
            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
        </div>
        <div class="form-group mr-2">
            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
        </div>
        <button type="submit" class="btn btn-primary mr-2">Filter</button>
        <a href="{{ route('employee.list') }}" class="btn btn-secondary">Reset</a>
    </form>
</div>


<div class="card mt-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Employee List</h5>
    </div>
    <form action="{{ route('employee.export') }}" method="GET" class="mb-3">
        <input type="hidden" name="department" value="{{ request('department') }}">
        <input type="hidden" name="from" value="{{ request('from') }}">
        <input type="hidden" name="to" value="{{ request('to') }}">
        <button type="submit" class="btn btn-success">Export to Excel</button>
    </form>

    <div class="card-body p-0">
        <table class="table table-bordered table-hover mb-0">
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Joining Date</th>
            </tr>
            </thead>
            <tbody>
            @forelse($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>₹ {{ number_format($employee->salary, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($employee->joining_date)->format('d M, Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No records found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="mt-3">
            {{ $employees->links() }}
        </div>

    </div>
</div>

