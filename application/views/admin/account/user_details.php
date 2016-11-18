<section class="content bordered-all">
                    
       

    <!-- CONTENT -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <h3>User Details</h3>
                
               
               
            </div>
           
        </div>

        <div class="row">
          
            
            <div class=" col-md-6 6"> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Full Name:</td>
                    <td><?php echo $user->first_name . " " . $user->last_name; ?></td>
                  </tr>
                  <tr>
                    <td>Hire date:</td>
                    <td>06/23/2013</td>
                  </tr>
                  <tr>
                    <td>Date of Birth</td>
                    <td>01/24/1988</td>
                  </tr>
               
                    
                  <tr>
                    <td>Address:</td>
                    <td><?php echo $user->address; ?></td>
                  </tr>
                  
                 
                </tbody>
              </table>
              
              <a href="#" class="btn btn-primary">Edit Details</a>
            </div>

            <div class=" col-md-6 6"> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Primary Phone:</td>
                    <td><?php echo $user->primary_phone; ?></td>
                  </tr>
                  <tr>
                    <td>Secondary Phone:</td>
                    <td><?php echo $user->secondary_phone; ?></td>
                  </tr>
                  <tr>
                    <td>Tertiary Phone:</td>
                    <td><?php echo $user->tertiary_phone; ?></td>
                  </tr>
               
                  <tr>
                    <td>Email:</td>
                    <td><?php echo $user->email; ?></td>
                  </tr>
                    <tr>
                    <td>Secondary Email:</td>
                    <td><?php echo $user->secondary_email; ?></td>
                  </tr>
                  
                 
                </tbody>
              </table>
              
             
            </div>
                  
        </div>


    </div>

</section>

