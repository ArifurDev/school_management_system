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
                              <input type="number" min="0" class="form-control" required="" title="Class Work" name="class_work[${subject.id}]">
                          </div>
                      </td>
  
                      <td>
                          <div class="form-group">
                              <input type="number" min="0" class="form-control" required="" title="Home Work" name="home_work[${subject.id}]">
                          </div>
                      </td>
  
                      <td>
                          <div class="form-group">
                              <input type="number" min="0" class="form-control" required="" title="Exam"  name="exam[${subject.id}]">
                          </div>
                      </td>

              <!-- Add other form fields for date, start time, end time, room number, full marks, pass marks -->
  
              `;
              subjectsContainer.appendChild(newRow);
          })
      
    })
    .catch(error => console.error('Error fetching subjects:', error));
  });
  
  
  
  
  
  