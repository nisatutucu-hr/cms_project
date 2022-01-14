<div class="col-md-12">
    <div class="widget p-lg">
        <h4 class="m-b-lg">Product list
            <a href="<?php echo base_url(
                'product'
            ); ?>" type="button" class="btn btn-danger pull-right btn-outline btn-sm">
                <i class="fa fa-arrow-left"></i>
                Back
            </a>
        </h4>

        <div class="widget-body">

            <form action="<?php echo base_url(
                'product/store'
            ); ?>" method="POST">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="title">
                    <b class="error_message"><?php echo isset($form_error)
                        ? form_error('title')
                        : ''; ?></b>

                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" placeholder="description">
                    <b class="error_message"><?php echo isset($form_error)
                        ? form_error('description')
                        : ''; ?></b>
                </div>


                <button type="submit" class="btn btn-primary btn-md">Save</button>
            </form>
        </div>
    </div>
</div>