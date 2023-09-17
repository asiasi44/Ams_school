<div class="row gx-5 align-items-center">
    <div class="col-md-6 col-name" >
        <div class="row align-items-center">
            <label for="name" class=" col-md-4 form-label " >Batch Name<span class="red_text"><b>*</b></span></label>
            <input type="text" class=" col-md-4 form-control" id="name" name="name" required value="{{!empty(old('name')) ? old('name') : $batch->name ?? ''}}">
             @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

   
</div>

    <div class="col-md-6 mt-4">
        <div class="row align-items-center">
            <label for="start_date" class=" col-md-4 form-label" >Start Date<span class="red_text"><b>*</b></span></label>
            <input type="date" class=" col-md-4 form-control" id="start_date" name="start_date" required value="{{!empty(old('start_date')) ? old('start_date') : $batch->start_date ?? ''}}">
            @error('start_date')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

<div class="row gx-5 align-items-center">
    <div class="col-md-6 col-name mt-4">
        <div class="row align-items-center">
            <label for="end_date" class=" col-md-4 form-label" >End Date<span class="red_text"><b>*</b></span></label>
            <input type="date" class=" col-md-4 form-control" id="end_date" name="end_date" required value="{{!empty(old('end_date')) ? old('end_date') : $batch->end_date ?? ''}}">
            @error('end_date')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
