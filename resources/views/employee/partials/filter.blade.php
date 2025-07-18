<form method="GET" action="{{ route('employees.index') }}">
    <select name="department">
        <option value="">All Departments</option>
        @foreach(['HR', 'Sales', 'Tech', 'Marketing'] as $dept)
            <option value="{{ $dept }}" {{ request('department') == $dept ? 'selected' : '' }}>{{ $dept }}</option>
        @endforeach
    </select>

    <input type="date" name="from_date" value="{{ request('from_date') }}">
    <input type="date" name="to_date" value="{{ request('to_date') }}">
    <button type="submit">Filter</button>
</form>
