<table>
    <thead>
        <tr>            
            <th> Transaction ID </th>
            <th> Package Name </th>
            <th> Student Id </th>
            <th> Student Name </th>
            <th> Amount </th>
            <th> Status </th>
            <th> Payment Time</th>

        </tr>
    </thead> 
    <tbody>
        @foreach ($payment as $item)

    <tr>              
       <td>{{$item->tid }}</td>
       <td> {{$item->pid}}</td>
       <td>{{$item->student_id }}</td>
       <td>{{$item->studentid }}</td>
       <td>{{$item->amount }} </td> 
    
       @if ($item->status ==1)
       <td>{{"Paid"}} </td> 
         @else
         
       <td>{{"Failed"}} </td>              
         @endif

       <td>{{$item->created_at}} </td>        
    </tr>
    @endforeach
  </tbody>
</table>