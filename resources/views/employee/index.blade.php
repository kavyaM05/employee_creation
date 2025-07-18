<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!--  jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJ+Y7RyKcG8z+q2cVQzkw5NvR0iLDDq+0i/Rg="
        crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="card shadow-sm">
    <div class="card-body">
        <h2><u>Employee Form</u></h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" class="saveEmployeeForm" action="{{ route('employee.save') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label><span class="required">*</span>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label for="email">Email</label><span class="required">*</span>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="department">Department</label><span class="required">*</span>
                <select class="form-control" name="department">
                    <option value="">Select Department</option>
                    @foreach(['HR', 'Sales', 'Tech', 'Marketing'] as $dept)
                        <option value="{{ $dept }}">{{ $dept }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="salary">Salary</label><span class="required">*</span>
                <input type="number" step="0.01" class="form-control" name="salary" placeholder="Enter salary">
            </div>

            <div class="form-group">
                <label for="joining_date">Joining Date</label><span class="required">*</span>
                <input type="date" class="form-control" name="joining_date">
            </div>
            <div class="errorWrapper"></div>
            <button type="submit" class="btn btn-primary saveEmployee">Add Employee</button>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>
    </div>
</div>

<script>
    {{--$('.saveEmployee').click(function () {--}}
    {{--    let errorWrapper = $('.errorWrapper').slideUp().empty();--}}
    {{--    $.post('{{ route('employee.save') }}', $('.saveEmployeeForm').serialize(), function (response) {--}}
    {{--        Ladda.stopAll();--}}
    {{--        toastr.success('employee saved successfully');--}}
    {{--    }).fail(function (response) {--}}
    {{--        Ladda.stopAll();--}}
    {{--        let errors = response.responseJSON.original;--}}

    {{--        for (let key in errors)--}}
    {{--            errorWrapper.append('<div class="error">' + errors[key] + '</div>');--}}

    {{--        errorWrapper.slideDown();--}}
    {{--    });--}}
    {{--})--}}

</script>
<style>
    .required {
        color: red;
    }
</style>
