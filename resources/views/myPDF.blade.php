<!DOCTYPE html>
<html>
<head>
    <title>Director Flight Operations</title>
    
  <STYLE type="text/css">    
    body { 
      font-family: "Gill Sans", sans-serif;
      font-size: 12pt;
      margin: 3em; 
    }
    h5 { color: red; background: white }
  </STYLE>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>
<body>
    <div class="row">
        <div class="col-6">
            <img 
                class="newable-logo" 
                src="{{ public_path('assets/BimanLogo.png') }}" 
                width="auto" height="40"
            >
        </div>
        <div class="col-6">
        <h5 style="text-align: center; background-color:lavender;">Leave assessment of cockpit crew</h5>
        </div>
    </div>
    
    <p>{{ $date }}</p>
    <p class="text-sm-end">List of leaves</p>
  
    <table class="table table-sm table-bordered">
        <tr  style="font-size: 10px;">
            <th>ID</th>
            <th>Type</th>
            <th>Month</th>
            <th>Availed</th>
            <th>Comment</th>
            <th>Comment</th>
        </tr>
        @foreach($users as $index=>$user)         
         <tr style="font-size: 10px;">
            <td colspan="4">
                <p style="font-size: 15px; height: 5px;"> 
                {{$user->name}} 
                </p>
            </td>
         </tr>
            @foreach($user->LeaveReports as $index=>$LeaveReport)
        <tr  style="font-size: 10px;">
            <td>{{ $index+1 }}</td>
            <td>{{ $LeaveReport->leave_type }}</td>
            <td>{{ $LeaveReport->leave_month }}</td>
            <td>{{ $LeaveReport->leave_availed }}</td>
            <td>{{ $LeaveReport->leave_availed }}</td>
            <td>{{ $LeaveReport->leave_availed }}</td>
        </tr>
            @endforeach
        @endforeach
    </table>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>   -->
</body>
</html>