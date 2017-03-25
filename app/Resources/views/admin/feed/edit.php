<?php require_once __DIR__ . '/../navbar.php' ?>
<form class="form-horizontal" action="/admin/feed/<?php echo $data['feed']['id']; ?>/update" method="post">
    <div class="form-group">
        <label class="control-label col-md-2" for="source"> Source </label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="source" name="source" required
                   value="<?php echo $data['feed']['source']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="rss"> Rss </label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="rss" name="rss" required value="<?php echo $data['feed']['rss']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="enabled"> Enabled </label>
        <div class="col-md-2">
            <select name="enabled" class="form-control">
                <option value="0" <?php echo (!$data['feed']['enabled']) ? 'selected' : false; ?> >No</option>
                <option value="1" <?php echo ($data['feed']['enabled']) ? 'selected' : false; ?>> Yes</option>
            </select>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
</form>