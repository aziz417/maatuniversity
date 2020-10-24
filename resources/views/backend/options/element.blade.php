   <div class="col-sm-8">
       <p>Select your option type:</p>
       <label>Image</label>
       <input type="checkbox" id="optionImage">
       <label>Text</label>
       @isset($id)
           <input type="hidden" value="{{ $id }}" name="question_id">
       @endisset
       <input type="checkbox" id="optionText">  <a class="text-primary pl-lg-5" href="{{ route('options.create') }}">Refresh</a>
       <div class="form-group" id="optionField">
           <label for="option">option</label>
           <input type="text" name="option" value="{{ old('option') }}" class="form-control" id="option">
           @error('option')
           <div class="alert alert-danger">{{ $message }}</div>
           @enderror
       </div>

       <div class="form-group" id="imageField">
           <label for="image">Image</label>
           <input type="file" name="image" class="form-control">
           @error('image')
           <div class="alert alert-danger">{{ $message }}</div>
           @enderror
       </div>

       <div class="form-group">
           <label for="answer">Is it correct answer ?</label>
           <input value="1" type="checkbox"  name="answer">
       </div>
   </div>
@push('script')
    <script>
        $(document).ready(function (){
            $("#optionImage").on('click', function (){
                $("#optionField").css('display', 'none');
            })
            $("#optionText").on('click', function (){
                $("#imageField").css('display', 'none');
            })
        })
    </script>
@endpush