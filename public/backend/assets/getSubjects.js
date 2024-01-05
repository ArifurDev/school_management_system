document.querySelector('#classSelector').addEventListener('change', (e) => {
  var selectedClass = e.target.value;

  // Make an AJAX request to get subjects based on the selected class
  fetch('/get-subjects/'+ selectedClass)
  .then(res => res.json())
  .then(subjects => {

        // Clear existing subjects in the form
        var subjectsContainer = document.getElementById('subjectsContainer');
        subjectsContainer.innerHTML = '';

        subjects.forEach(subject => {
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
            
                    <input type="hidden" name="subjectId[]" value="${subject.id}">
                    <td>
                        <div class="form-group">
                            <input type="text"  class="form-control" required=""  name="subject_name" value="${subject.subject_name}">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="date" class="form-control" required="" name="date[${subject.id}]">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" required="" title="Start Time" name="start_time[${subject.id}]">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" required="" title="End Time"  name="end_time[${subject.id}]">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" required="" title="Room Number" name="room_number[${subject.id}]">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="number" min="0" class="form-control" required="" title="Full Marks" name="full_marks[${subject.id}]">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="number" min="0" class="form-control" required="" title="Pass Marks" name="pass_marks[${subject.id}]">
                        </div>
                    </td>

 

            <!-- Add other form fields for date, start time, end time, room number, full marks, pass marks -->

            `;
            subjectsContainer.appendChild(newRow);
        })
    
  })
  .catch(error => console.error('Error fetching subjects:', error));
});





