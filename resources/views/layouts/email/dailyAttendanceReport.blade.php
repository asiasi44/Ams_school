{{-- {{dd($mainGroups->first()->filterSubject())}} --}}
<div>
    <p>Hello All,</p>
    <p>Please find the details of today's attendance of Class of {{$batch->name}} -  ( Semester {{ $batch->semester}}).</p>
    <p> {{ date('M d , Y')}} </p>
    @if(!empty($mainGroups))
        @foreach ($mainGroups as $mainGroup)
        <table border="1">
            <thead>
                <tr style="text-align: center">
                    <td colspan="{{count($mainGroup->filterSubject())+1}}">

                        Section {{ $mainGroup->name ?? 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <td><b>Course/Course Teacher</b></td>
                    @foreach ($mainGroup->filterSubject() as $groupSubjectTeacher)
                            <td>
                                <b>{{ ucfirst($groupSubjectTeacher->groupSubject->subject_id) }} <br> ({{ ucfirst($groupSubjectTeacher->user->name) }})</b> <br> ({{ $groupSubjectTeacher->days}})
                            </td>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{-- Get Present Students Number --}}
                <tr>
                    <td> Present No. </td>
                    @foreach ($mainGroup->filterSubject() as $groupSubjectTeacher)
                        @if($groupSubjectTeacher->checkAttendance($batch) == 0)
                            <td>0</td>
                        @else
                            <td>
                                {{$groupSubjectTeacher->getPresentCount($batch)}}
                            </td>
                        @endif
                    @endforeach
                </tr>
                {{-- Get Absent Count --}}
                <tr>
                    <td> Absent No. </td>
                    @foreach ($mainGroup->filterSubject() as $groupSubjectTeacher)
                        @if($groupSubjectTeacher->checkAttendance($batch) == 0)
                            <td>0</td>
                        @else
                            <td>
                                {{$groupSubjectTeacher->getAbsentCount($batch)}}
                            </td>
                        @endif
                    @endforeach
                </tr>
                {{-- Get Leave Count --}}
                <tr>
                    <td> Leave No. </td>
                    @foreach ($mainGroup->filterSubject() as $groupSubjectTeacher)
                        @if($groupSubjectTeacher->checkAttendance($batch) == 0)
                            <td>0</td>
                        @else
                            <td>
                                {{$groupSubjectTeacher->getLeaveCount($batch)}}
                            </td>
                        @endif
                    @endforeach
                </tr>
                {{-- Get Absentees --}}
                <tr>
                    <td> Absentees </td>
                    @foreach ($mainGroup->filterSubject() as $groupSubjectTeacher)
                        @if($groupSubjectTeacher->checkAttendance($batch) == 0)
                            <td>Attendance not Taken Today</td>
                        @else
                            <td>
                                @forelse ($groupSubjectTeacher->getAbsentees($batch) as $student)
                                    {{ $student}} <br>
                                @empty
                                    No Absentees Today
                                @endforelse
                            </td>
                        @endif
                    @endforeach
                </tr>
                {{-- No Absentees --}}
                <tr>
                    <td> On Leave </td>
                    @foreach ($mainGroup->filterSubject() as $groupSubjectTeacher)
                        @if($groupSubjectTeacher->checkAttendance($batch) == 0)
                         <td>Attendance not Taken Today</td>
                        @else
                            <td>
                                @forelse ($groupSubjectTeacher->getOnLeaves($batch) as $student)
                                    {{ $student}} <br>
                                @empty
                                    No one is On Leave Today
                                @endforelse
                            </td>
                        @endif
                    @endforeach
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <br>
    @endforeach
    @endif
    @if (!empty($electiveGroups))
        @foreach ($electiveGroups as $electiveGroup)
            <table border="1">
                <thead>
                    <tr style="text-align: center">
                        <td colspan="{{count($electiveGroup->filterSubject())+1}}">

                            Section {{ $electiveGroup->name ?? 'N/A' }}
                        </td>
                    </tr>
                    <tr>
                        <td><b>Course/Course Teacher</b></td>
                        @foreach ($electiveGroup->filterSubject() as $groupSubjectTeacher)
                                <td>
                                    <b>{{ ucfirst($groupSubjectTeacher->groupSubject->subject_id) }} <br> ({{ ucfirst($groupSubjectTeacher->user->name) }})</b> <br> ({{ $groupSubjectTeacher->days}})
                                </td>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    {{-- Get Present Students Number --}}
                    <tr>
                        <td> Present No. </td>
                        @foreach ($electiveGroup->filterSubject() as $groupSubjectTeacher)
                            @if($groupSubjectTeacher->checkAttendance($batch) == 0)
                                <td>0</td>
                            @else
                                <td>
                                    {{$groupSubjectTeacher->getPresentCount($batch)}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    {{-- Get Absent Count --}}
                    <tr>
                        <td> Absent No. </td>
                        @foreach ($electiveGroup->filterSubject() as $groupSubjectTeacher)
                            @if($groupSubjectTeacher->checkAttendance($batch) == 0)
                                <td>0</td>
                            @else
                                <td>
                                    {{$groupSubjectTeacher->getAbsentCount($batch)}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    {{-- Get Leave Count --}}
                    <tr>
                        <td> Leave No. </td>
                        @foreach ($electiveGroup->filterSubject() as $groupSubjectTeacher)
                            @if($groupSubjectTeacher->checkAttendance($batch) == 0)
                                <td>0</td>
                            @else
                                <td>
                                    {{$groupSubjectTeacher->getLeaveCount($batch)}}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    {{-- Get Absentees --}}
                    <tr>
                        <td> Absentees </td>
                        @foreach ($electiveGroup->filterSubject() as $groupSubjectTeacher)
                            @if($groupSubjectTeacher->checkAttendance($batch) == 0)
                                <td>Attendance not Taken Today</td>
                            @else
                                <td>
                                    @forelse ($groupSubjectTeacher->getAbsentees($batch) as $student)
                                        {{ $student}} <br>
                                    @empty
                                        No Absentees Today
                                    @endforelse
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    {{-- No Absentees --}}
                    <tr>
                        <td> On Leave </td>
                        @foreach ($electiveGroup->filterSubject() as $groupSubjectTeacher)
                            @if($groupSubjectTeacher->checkAttendance($batch) == 0)
                             <td>Attendance not Taken Today</td>
                            @else
                                <td>
                                    @forelse ($groupSubjectTeacher->getOnLeaves($batch) as $student)
                                        {{ $student}} <br>
                                    @empty
                                        No one is On Leave Today
                                    @endforelse
                                </td>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <br>
        @endforeach
    @endif

    <p>Regards,</p>
    <br>
    <div id="signature">
        --<br>
        <span style="color:#0b5394;"><b>AMS SYSTEM</b></span><br>
        Deerwalk Institute of Technology<br>
        Sifal, Kathmandu<br>
        Nepal<br>
        <a href="deerwalk.edu.np">deerwalk.edu.np</a>
        <br>
        <p style="color:888888; font-family: ui-monospace;">
            DISCLAIMER:<br>
            This is an automatically generated email - please do not reply to it. If you have any queries please contact Admistration.
        </p>
    </div>
</div>
