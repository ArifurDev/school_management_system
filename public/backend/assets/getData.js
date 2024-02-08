document.querySelector('#classSelector').addEventListener('change', (e) => {
    var selectedClass = e.target.value;

    // Make an AJAX request to get subjects based on the selected class
    fetch('/get-data/'+ selectedClass)
    .then(res =>res.json())
    .then(data => {
              const subjects = data.subjects;
              const students = data.students;

              //subjects show in table row
              const tableHeadTr = document.getElementById('table_head_tr');
              // Student column
              tableHeadTr.innerHTML = '<th>Student</th>'; // Initial column for student
              // Add subject columns
              subjects.forEach(subject => {
                  tableHeadTr.innerHTML += `<th>${subject.subject_name}</th>`;
              });


              const studentsContainer = document.getElementById('studentsContainer');
              // Clear existing students in the form
              studentsContainer.innerHTML = '';

              // Add rows for students
              students.forEach(student => {
                let studentRow = `<tr>
                <input type="hidden" name="studentId[]" value="${student.id}">

                <td>${student.name}</td>`;
                // Add input fields for each subject
                subjects.forEach(subject => {
                  studentRow += `
                      <input type="hidden" name="subjectId[]" value="${subject.id}">
                      <td>
                          <div class="form-group">
                              <label for="class_work[${student.id}]">Class Work</label>
                              <input type="text" id="class_work[${student.id}]" class="form-control form-control-sm"  name="class_work[${student.id}][${subject.id}]">
                          </div>
                          <div class="form-group">
                              <label for="home_work[${student.id}]">Home Work</label>
                              <input type="text" id="home_work[${student.id}]" class="form-control form-control-sm"  name="home_work[${student.id}][${subject.id}]">
                          </div>
                          <div class="form-group">
                              <label for="exam[${student.id}]">Exam</label>
                              <input type="text" id="exam[${student.id}]" class="form-control form-control-sm"  name="exam[${student.id}][${subject.id}]">
                          </div>
                      </td>`;
              });

              studentRow += `</tr>`;
              studentsContainer.innerHTML += studentRow;

      });

    })
    .catch(error => console.error('Error fetching subjects:', error));
  });








