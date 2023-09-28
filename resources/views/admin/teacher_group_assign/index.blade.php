@extends('layouts.admin.app')

@section('title','User')

@section('content')

<div class="below_header">
    <h1>Assign Teacher to Section Subject</h1>
    @include('layouts.admin.formTabs')
</div>
<section class="my-3 pt-3">
    <div class="text-center">
        <h1 class="fs-2 title">Teacher Group Assign</h1>
    </div>
    <div class="underline mx-auto"></div>
</section>
<!-- page title end -->

<section class="addbtn">

    <a href="{{route('teacher-group-assign.create')}}">
        <button class="btn btn-primary">
            <i class='bx bx-add-to-queue'></i>
                Add
        </button>
    </a>
</section>

<div class="table_container mt-3">
    <table class="_table mx-auto amsTable">
        <thead>
            <tr class="table_title">
                <th>S.N</th>
                <th>Name</th>
                <th>Section</th>
                <th>Days</th>
                <th>Max Class Per Day</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count =1;
            @endphp
            @forelse($teachers as $teacher)

           @forelse ($groups as $group )

           @empty

           @endforelse

                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $group->name }}</td>
                        <td>Days after create</td>

                        <td class="text-center">
                            {{-- <a href="{{route('teacher_subject_group_assign.edit', [$groupSubject->id, $teacher->id])}}"><i class="far fa-edit"></i></a> --}}
                        </td>
                        @php
                            $count++
                        @endphp
                    </tr>

            @empty
            <td colspan='7' class="text-center">No users available</td>
            @endforelse

        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.amsTable').DataTable();
    })
</script>
@endsection
