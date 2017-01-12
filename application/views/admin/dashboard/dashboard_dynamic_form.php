
<div class="panel ">
                   

    <div class="panel-body">

        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title" >
                    
                    <h5 style="padding-left: 25px;">Is this a active client?</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>accountsettings/change_ip">
			            <div class="form-group">
			                <label for="inputEmail3" class="col-sm-2  control-label"> Status</label>
			                <div class="col-sm-6 ">
			                    <select class="form-control ">
			                    	<option>Active</option>
			                    	<option>Disabled</option>
			                    	<option>InActive</option>
			                    	<option>Uninstall</option>
			                    </select>
			                  
			                </div>
			               
			                <div class="col-sm-4 col-md-2">
			                    <button class="btn btn-primary ark-ex-loading" data-loading-text="Saving...">Save</button>
			                </div>

			            </div>
			           
			            
			        </form>
                </div>
            </div>
        </div>
    </div>


</div>

