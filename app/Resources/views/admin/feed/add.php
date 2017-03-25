<?php require_once __DIR__ . '/../navbar.php'; ?>

<form class="form-horizontal" action="/admin/feed/insert" method="post">
    <div class="form-group">
        <label class="control-label col-md-2" for="source"> Source </label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="source" name="source" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="rss"> Rss </label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="rss" name="rss" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="enabled"> Enabled </label>
        <div class="col-md-2">
            <select name="enabled" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>