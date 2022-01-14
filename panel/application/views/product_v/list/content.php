<div class="col-md-12">
    <div class="widget p-lg">
        <h4 class="m-b-lg">Product list
            <a href="<?php echo base_url("product/create") ?>" type="button" class="btn btn-success pull-right btn-outline btn-sm">
                <i class="fa fa-plus"></i>
                Add
            </a>
        </h4>


        <table class="table table-bordered  table-striped">
            <thead>
                <th>id</th>
                <th>date</th>
                <th>url</th>
                <th>title</th>
                <th>description</th>
                <th>status</th>
                <th>action</th>
            </thead>

            <tbody class="sortable" data-url="<?php echo base_url('product/rankSetter') ?>">
                <?php foreach ($items as $item) { ?>
                    <tr id='order-<?php echo $item->id ?>'>
                        <td><?php echo $item->id ?></td>
                        <td><?php echo $item->createdAt ?></td>
                        <td><?php echo $item->url ?></td>
                        <td><?php echo $item->title ?></td>
                        <td><?php echo $item->description ?></td>
                        <td>
                            <input <?php echo $item->isActive == '1' ? 'checked ' : '' ?> type="checkbox" data-switchery data-size="small" data-color="#10c469" class="isActiveSetter" data-url="<?php echo base_url("product/isActiveSetter/{$item->id}") ?>" />
                        </td>
                        <td>
                            <button class="btn btn-dark btn-sm">
                                <i class="fa fa-edit"></i>
                                edit</button>
                            <a href="#" data-url="<?php echo base_url("product/delete/{$item->id}") ?>" class="btn btn-danger btn-sm remove-btn">
                                <i class="fa fa-trash"></i>
                                delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>