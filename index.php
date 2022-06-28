<?php include('header.php');?>
    <div class="col-lg-6 mx-auto mt-3">
      <div class="text-center"></div>
          <h3>Select which symlink you need to generate</h3>
          <form action="actions.php?" method="GET">
              <select class="form-control" name="generate_symlink" id="generate_symlink" onchange="this.form.submit()">
                  <option value="">Select</option>
                  <option value="wordfence">Wordfence Symlinks</option>
                  <option value="etcache">Divi et-cache Symlink</option>
                  <option value="wprocket">WP Rocket Symlink</option>
                  <option value="webpexpress">WebP Express Symlink</option>
                  <option value="cache">Cache Symlink (Don't use this with WP Rocket)</option>
                  <option value="languages">WPML Languages</option>
              </select>
          </form>
        
      <hr/>

        <div class="alert alert-dark bg-dark text-white">
          <h4 class="text-warning">Important Note</h4>
          <div class="alert alert-info"><strong>Only use this in dev environment while in SFTP mode and do not forget to commit and deploy the changes.</strong>
          <hr>
          Please do not forget to SFTP to the environment you are working on and make sure that the symlink target exists.
          If you need to know more about Pantheon Symlinks please see https://pantheon.io/docs/symlinks-assumed-write-access
          </div>
          <hr>
          <h5>Extra Steps for Supported Plugins</h5>

          <div class="accordion accordion-flush text-dark" id="accordionFlushExample">
          <!--ITEM-->
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                WP Rocket
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
              <ul>
                <li>Before generating WP Rocket Symlinks please edit <code>.gitignore</code> and comment out <code>wp-content/advanced-cache.php &amp; wp-content/cache</code>
</li>
              </ul>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingtwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsetwo" aria-expanded="false" aria-controls="flush-collapsetwo">
                WordFence
              </button>
            </h2>
            <div id="flush-collapsetwo" class="accordion-collapse collapse" aria-labelledby="flush-headingtwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
              <ul>
                <li>Before creating the WordFence Symlinks please deactivate the plugin first.</li>
              </ul>
              </div>
            </div>
          </div>
          <!--/ITEM-->
          </div>

        </div>

<?php include('footer.php');?> 