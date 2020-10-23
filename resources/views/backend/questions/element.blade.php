   <div class="col-sm-8">
       <div class="form-group">
           <label for="lesson">Select Lesson</label>
           <select name="lesson_id" class="form-control" required id="lesson_id">
               <option selected value="">Chose lesson</option>
               <option value="1">Lesson 1.1: Adding and Subtraction</option>
               <option value="2">Lesson 1.2: Addition Computation Through 500</option>
               <option value="3">Lesson 1.3: Finding Diffenence</option>
           </select>
           @error('lesson_id')
           <div class="alert alert-danger">{{ $message }}</div>
           @enderror
       </div>
       <div class="form-group">
           <label for="title">Title</label>
           <input type="text" name="title" value="{{ isset($question->title) ? $question->title : old('title')}}" class="form-control" id="title" required>
           @error('title')
           <div class="alert alert-danger">{{ $message }}</div>
           @enderror
       </div>

       <div class="form-group">
           <label for="audio">Audio</label>
           <input type="file" value="{{ isset($question->audio) ? $question->audio : old('audio')}}" name="audio" class="form-control" id="audio">
           @error('audio')
           <div class="alert alert-danger">{{ $message }}</div>
           @enderror
       </div>

       <div class="form-group">
           <label for="status">Status</label>
           <input value="1" type="checkbox" {{ isset($question) && $question->status == 1 ? 'checked' : ''}} name="status" id="status">
       </div>
   </div>
