<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <h2>Users</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Surname</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>State</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			  foreach ($result as $user){
					echo '<tr><td>'.$user["surname"].'</td><td>'.$user["name"].'</td><td>'.$user["age"].'</td><td>'.$user["state"].'</td></tr>';
				}
			  
			  ?>
                
              </tbody>
            </table>
          </div>
        </main>