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
      <h3>Fees Collection Report</h3>
    </div>

    <div class="card-body">
      <table>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Expens Type</th>
            <th>Amount</th>
            <th>Due</th>
        </tr>
        <tr>
          <td>{{ $feecollection->User->name }}</td>
          <td>{{ $feecollection->User->phone }}</td>
          <td>{{ $feecollection->expense }}</td>
          <td>{{ $feecollection->amount }}</td>
          <td>
            @if ($feecollection->due === null)
              <span>Paid</span>
            @else
              {{ $feecollection->due }}
            @endif
          </td>
        </tr>
      </table>

      <div class="note">
        <b>Notes:</b>
        <p>{{ $feecollection->description }}</p>
      </div>
    </div>

    <div class="card-footer">
      <div class="right-section">
        <span>Submit Date: {{ $feecollection->created_at }}</span>
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
