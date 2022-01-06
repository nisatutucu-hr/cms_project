<div class="col-md-12">
    <div class="widget p-lg">
        <h4 class="m-b-lg">Product list
            <button type="button" class="btn btn-success pull-right btn-outline btn-sm">
                <i class="fa fa-plus"></i>
                Add
            </button>
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

            <tbody>
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <td><?php echo $item->id ?></td>
                        <td><?php echo $item->createdAt ?></td>
                        <td><?php echo $item->url ?></td>
                        <td><?php echo $item->title ?></td>
                        <td><?php echo $item->description ?></td>
                        <td>
                            <input id="switch-2-2" type="checkbox" data-switchery data-size="small" data-color="#10c469" checked />
                        </td>
                        <td>
                            <button class="btn btn-dark btn-sm">
                                <i class="fa fa-edit"></i>
                                edit</button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                                delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>