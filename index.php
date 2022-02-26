<?php include('header.php');?>
    <div class="col-lg-6 mx-auto mt-3">
      <div class="text-center"></div>
          <h3>Select which symlink you need to generate</h3>
          <form action="actions.php?" method="GET">
              <select class="form-control" name="generate_symlink" id="generate_symlink" onchange="this.form.submit()">
                  <option value="">Select</option>
                  <option value="wordfence">Wordfence Symlinks</option>
                  <option value="etcache">Divi et-cache Symlink</option>
                  <option value="wprocket">WP Rocket</option>
                  <option value="cache">Cache Symlink (Don't use this with WP Rocket)</option>
              </select>
          </form>
        
      <hr/>

        <div class="alert alert-info">
          <h4>Important Note</h4>
          Only use this on dev environment while on SFTP mode 
          and don't forget to commit and deploy the changes

          <hr>
          Note that this script only generate the symlinks and not the targets, Please do not forget to SFTP to the environment you are working on and make sure that the symlink target exists.
        </div>

<?php include('footer.php');?>