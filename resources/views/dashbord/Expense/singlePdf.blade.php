<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Expense Report</title>
  <style>
    .card {
      margin: auto;
      padding: auto;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    .download-date{
    margin-top:100%;
    margin-left:80%;
  }
  </style>
</head>
<body>
  <div class="card">
    <div class="card-header">
      <h3>Expense Report</h3>
    </div>

    <div class="card-body">
      <table>
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Expense Type</th>
          <th>Amount</th>
          <th>Status</th>
          <th>Due</th>
        </tr>
        <tr>
          <td>{{ $expense->name }}</td>
          <td>{{ $expense->phone }}</td>
          <td>{{ $expense->expens_type }}</td>
          <td>{{ $expense->amount }}</td>
          <td>{{ $expense->status }}</td>
          <td>
            @if ($expense->due === null)
              <span>Paid</span>
            @else
              {{ $expense->due }}
            @endif
          </td>
        </tr>
      </table>

      <div class="note">
        <b>Notes:</b>
        <p>{{ $expense->description }}</p>
      </div>
    </div>

    <div class="card-footer">
      <div class="left-section">
        <span>Date: {{ $expense->date }}</span>
      </div>
      <div class="right-section">
        <span>Submit Date: {{ $expense->created_at }}</span>
      </div>
    </div>
    <div class="download-date">
      <?php 
        $date = now();
        ?>
        {{ $date }}
    </div>
  </div>
</body>
</html>
