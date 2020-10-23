   <div class="col-sm-8">
       <div class="form-group">
           <label for="option">Option</label>
           <input type="text" name="option" value="{{ isset($question->option) ? $question->option : old('option')}}" class="form-control" id="option">
           @error('option')
           <div class="alert alert-danger">{{ $message }}</div>
           @enderror
       </div>

       <div class="form-group">
           <label for="image">Image</label>
           <input type="file" name="image" class="form-control">
           @error('image')
           <div class="alert alert-danger">{{ $message }}</div>
           @enderror
       </div>

       <div class="form-group">
           <label for="status">Status</label>
           <input value="1" type="checkbox" {{ isset($question) && $question->status == 1 ? 'checked' : ''}} name="status" id="status">
       </div>
   </div>
