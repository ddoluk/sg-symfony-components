<?php require_once 'navbar.php'; ?>
<div class="text-center">
    <a class="btn btn-primary" href="/admin/feed/add" role="button">Add</a>
</div>
<div class="row">
    <div class="col-md-8 col-xs-offset-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Source</th>
                <th>Rss</th>
                <th>Enabled</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($data): ?>
                <?php foreach ($data['feeds'] as $feed): ?>
                    <tr>
                        <td><?php echo $feed['source'] ?></td>
                        <td><?php echo $feed['rss'] ?></td>
                        <td><?php echo (!$feed['enabled']) ? 'No' : 'Yes'; ?></td>
                        <td width="5%">
                            </form>
                            <form action="/admin/feed/<?php echo $feed['id'] ?>/edit" method="post">
                                <button class="btn bg-info" type="submit" name="edit_id"> Edit</button>
                            </form>
                        </td>
                        <td width="5%">
                            <form action="/admin/feed/<?php echo $feed['id'] ?>/delete" method="post">
                                <button class="btn bg-danger" type="submit" name="member_id"> Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>