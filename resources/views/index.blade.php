<!DOCTYPE html>
<html>
<head>
    <title>Create Drag and Droppable Datatables Using jQuery UI Sortable in Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
    
            <h3 class="text-center mb-4">Laravel Task </h3>
            <div class="container-fluid">
              <div class="row">
                
                <div class="col-lg-6 col-md-12">
                  <h4 class="text-center">Section 1</h4>
                  <form id="storeform1">
                    <input type="text" class="Name" name="Name">
                    <input type="date" class="Birthdate" name="Birthdate" >
                    {{-- <input type="date" id="created_at" name="created_at" > --}}
                    <button id="add_section1" class="btn btn-info"><i class="fa fa-plus"></i></button>
                  
                </form>
                  <table class="table table-bordered">
              <thead>
                <tr>
                  
                  <th>Name</th>
                  <th>Birthdate</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tablesection1" style="height: 20px;">
                
                @foreach($section1s as $section1)
                <form class="section1form" id="section1Form">
                  <tr id="{{ $section1->id }}">
                    
                    <td class="Name"><input type="text" name="Name" value="{{ $section1->Name }}"></td>
                    <td class="Birthdate"><input type="date" name="Birthdate" value="{{ $section1->Birthdate }}"></td>
                    <td><input type="text" name="created_at" value="{{ date('M,d Y h:i a',strtotime($section1->created_at)) }}" readonly></td>
                     <td><button id="update_section1" data-id="{{ $section1->id }}" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                      <button id="delete_section1" data-id="{{ $section1->id }}" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>

                  </tr>
                  </form>
                @endforeach
              </tbody>
            </table>
                </div>
                
                <div class="col-lg-6 col-md-12">
                  <h4 class="text-center">Section 2</h4>
                  <form id="storeform2">
                    <input type="text" class="Name" name="Name"></td>
                    <input type="date" class="Birthdate" name="Birthdate" ></td>
                    {{-- <input type="date" id="created_at" name="created_at" > --}}</td>
                   <button id="add_section2" class="btn btn-info"><i class="fa fa-plus"></i></button></td>
                  
                </form>
                  <table class="table table-bordered">
              <thead>
                <tr>
                  
                  <th>Name</th>
                  <th>Birthdate</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tablesection2" style="height: 20px;">
                
                @foreach($section2s as $section2)
                <form class="section2form" id="section2Form">
                  <tr id="{{ $section2->id }}">
                    
                    <td class="Name"><input type="text" name="Name" value="{{ $section2->Name }}"></td>
                    <td class="Birthdate"><input type="date" name="Birthdate" value="{{ $section2->Birthdate }}"></td>
                    <td><input type="text" name="created_at" value="{{ date('M,d Y h:i a',strtotime($section2->created_at)) }}" readonly></td>
                     <td><button id="update_section2" data-id="{{ $section2->id }}" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                      <button id="delete_section2" data-id="{{ $section2->id }}" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>

                  </tr>
                  </form>
                @endforeach
              </tbody>
            </table>
                </div>
                
              </div>
            </div>

            
    	
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
</body>
</html>