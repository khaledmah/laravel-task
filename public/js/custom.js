$(function () {
  var baseurl="http://127.0.0.1:8000/";
          
          function addsection(button,url,type) {
          var token = $('meta[name="csrf-token"]').attr('content');
          var Name=button.closest("form").find("input.Name").val();
          var Birthdate=button.closest("form").find("input.Birthdate").val();
          if (Name =='' || Birthdate == ''){
            alert('invalid data input');
            return false;
          } 
          
          $.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl+url,
            data: {Name:Name,
              Birthdate:Birthdate,
              _token: token
            },
            success: function(data) {
              
                if (data.status == "success") {
                  $( "#tablesection"+type ).append("<tr class='section"+type+"' id='"+data.data[0].id+"'>"+
                    
                    "<td class='Name'><input type='text' name='Name' value='"+data.data[0].Name+" '></td>"+
                    "<td class='Birthdate'><input type='date' name='Birthdate' value='"+data.data[0].Birthdate+"'></td>"+
                    "<td><input type='text' name='created_at' value='"+ data.data[0].created_at  +"' readonly></td>"+
                     "<td><button id='update_section"+type+"' class='btn btn-warning' data-id='" + data.data[0].id + "'><i class='fa fa-edit'></i></span></button>"+
                      " <button id='delete_section"+type+"' class='btn btn-danger' data-id='" + data.data[0].id + "'><i class='fa fa-trash'></i></button></td></tr>");

                  button.closest("form").find("input.Name").val('');
                  button.closest("form").find("input.Birthdate").val('');
                  alert('added successfully');
                } 
                else {console.log('error');}
            }
          });

        }

         function updatesection(button,url){
          var token = $('meta[name="csrf-token"]').attr('content');
          var id = button.attr('data-id');
          var Name=button.closest("tr").find("td.Name input").val();
          var Birthdate=button.closest("tr").find("td.Birthdate input").val();
          
           $.ajax({
            type: "post",
            dataType: "json",
            url: baseurl+url+"/"+ id,
            data: {Name:Name,
              Birthdate:Birthdate,
              _token: token
            },
            success: function(data) {
                if (data.status == "success") {
                   var Name=$(this).closest("tr").find("td.Name input").val(data.data[0].Name);
                   var Birthdate=$(this).closest("tr").find("td.Birthdate input").val(data.data[0].Birthdate);
                   var created_at=$(this).closest("tr").find("td.created_at input").val(data.data[0].created_at);
                   alert(data.message);
                  
                 
                } else {
                  console.log(data);
                }
            }
          });

        }

        function deletesection(button,url) {
          var id = button.attr('data-id');

          $.ajax({
            type: "get",
            url: baseurl+url+"/"+ id,
            success: function(response) {
                if (response.status == "success") {
                  button.closest("tr").remove();
                  alert('deleted successfully');
                } else {
                  console.log(response);
                }
            }
          });
        }


        $( "#tablesection1" ).sortable({
          connectWith:"#tablesection2",
          remove: function(event, ui) {
            
            var tr=$(this).data().uiSortable.currentItem;
            
            var token = $('meta[name="csrf-token"]').attr('content');
            var Name=tr.find('td.Name input').val();
            var Birthdate=tr.find('td.Birthdate input').val();
            var id=tr.find('button.btn-warning').attr('data-id');
            
            tr.find('button.btn-warning').attr('id', 'update_section2');
            tr.find('button.btn-danger').attr('id', 'delete_section2');
            $.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl+"store-section2",
            data: {
              Name:Name,
              Birthdate:Birthdate,
              _token: token
            },
            success: function(data) {

                if (data.status == "success") {
                  tr.find('button.btn-warning').attr('data-id',data.data[0].id);
                  tr.find('button.btn-danger').attr('data-id', data.data[0].id);
                  tr.attr('data-id', data.data[0].id);
                   $.ajax({
                    type: "get",
                    url: baseurl+"delete-section1"+"/"+ id,
                    success: function(response) {
                      if (response.status == "success") {
                        
                        
                      } else {
                        
                          }
                        }
                      });
                 } else {
                  console.log('error');
                }
              }
            });
            return true;
          }
        });
          $( "#tablesection2" ).sortable({
          connectWith:"#tablesection1",
          remove: function(event, ui) {

            var tr=$(this).data().uiSortable.currentItem;
            

            var token = $('meta[name="csrf-token"]').attr('content');
            var Name=tr.find('td.Name input').val();
            var Birthdate=tr.find('td.Birthdate input').val();
            var id=tr.find('button.btn-warning').attr('data-id');
          
            tr.find('button.btn-warning').attr('id', 'update_section1');
            tr.find('button.btn-danger').attr('id', 'delete_section1');
            $.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl+"store-section1",
            data: {Name:Name,
              Birthdate:Birthdate,
              _token: token
            },
            success: function(data) {
                if (data.status == "success") {
                  tr.find('button.btn-warning').attr('data-id',data.data[0].id);
                  tr.find('button.btn-danger').attr('data-id', data.data[0].id);
                  tr.attr('id', data.data[0].id);


                  
                  $.ajax({
                    type: "get",
                    url: baseurl+"delete-section2" +"/"+ id,
                    success: function(response) {
                      if (response.status == "success") {
                      
                      } else {
                       
                      }
                    }
                  });
                } else {
                  console.log('error');
                }
              }
            });
            return true;
          }
        }); 
           $("body" ).on('click','#add_section1',function (e) {
            e.preventDefault();
         addsection($(this),'store-section1','1');

        });
            $("body" ).on('click','#add_section2',function (e) {
            e.preventDefault();
         addsection($(this),'store-section2','2');

        });
               $("body" ).on('click','#update_section1',function (e) {
              e.preventDefault();
         updatesection($(this),'update-section1');

        });
            $("body" ).on('click','#update_section2',function (e) {
              e.preventDefault();
         updatesection($(this),'update-section2');

        });
          $("body" ).on('click','#delete_section1',function (e) {
            e.preventDefault();
         deletesection($(this),'delete-section1');

        });
          $("body" ).on('click','#delete_section2',function (e) {
            e.preventDefault();
         deletesection($(this),'delete-section2');

        });
         
          


      });