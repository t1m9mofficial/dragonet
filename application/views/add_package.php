<div class="content-wrapper">
    <h3>Packages
        <small>Add New Package</small>
    </h3>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Add New Package Form</div>
                <div class="panel-body">
                    <form action="<?php echo base_url(); ?>packages/add/" role="form" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input autofocus type="text" name="name" placeholder="Enter name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Speed</label>
                            <input type="text" name="speed" placeholder="Enter speed" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="email" name="price" placeholder="Enter price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="description" placeholder="Enter description" class="form-control"></textarea>
                        </div>
                        
                        <button type="submit" class="mb-sm btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
